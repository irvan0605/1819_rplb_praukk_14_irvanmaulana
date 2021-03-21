<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman Kelola Penggunaan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Tarif.
 * Menggunakan Model Pelanggan.
 * Menggunakan Model Penggunaan.
 * Menggunakan Model Tagihan.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tarif;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tagihan;


class PenggunaanController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data penggunaan dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('admin')) {

            $penggunaan = Tagihan::orderBy('id', 'DESC')->get();

            return view('admin.penggunaan', compact('penggunaan'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan form untuk membuat data penggunaan baru.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Gate::allows('admin')) {

            $penggunaan = Penggunaan::max('id') + 1;
            $pelanggan = Pelanggan::get();

            return view('admin.penggunaan_add', compact('pelanggan', 'penggunaan'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Mengambil nilai meter awal dari pelanggan yang ditentukan di form untuk membuat data penggunaan baru.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function findMeter(Request $request)
    {
        $meter = Penggunaan::where('pelanggan_id', $request->id)->max('meter_akhir');

        if (!$meter) {
            $meter_awal = 0;
        } else {
            $meter_awal = $meter;
        }

        return response()->json($meter_awal);
    }

    /**
     * Menyimpan data penggunaan yang baru dibuat di database.
     * Menyimpan data tagihan berdasarkan data penggunaan di database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPenggunaan = [
            'id'                    => $request->id,
            'pelanggan_id'          => $request->pelanggan_id,
            'bulan'                 => $request->bulan,
            'tahun'                 => $request->tahun,
            'meter_awal'            => $request->meter_awal,
            'meter_akhir'           => $request->meter_akhir,
        ];

        $rules = [
            'pelanggan_id'          => ['required'],
            'bulan'                 => ['required'],
            'tahun'                 => ['required'],
            'meter_awal'            => ['required'],
            'meter_akhir'           => ['required'],
        ];
        $messages = [
            'pelanggan_id.required'     => 'ID Pelanggan wajib diisi.',
            'bulan.required'            => 'Bulan wajib diisi.',
            'tahun.required'            => 'Tahun wajib diisi.',
            'meter_awal.required'       => 'Meter Awal wajib diisi.',
            'meter_akhir.required'      => 'Meter Akhir wajib diisi.',
        ];

        $validator =  Validator::make($dataPenggunaan, $rules, $messages);
        $validator->validate();

        // Ambil data penggunaaan berdasarkan pelanggan_id, bulan, dan tahun yang diinput
        $data = Penggunaan::where('pelanggan_id', $request->pelanggan_id)->where('bulan', $request->bulan)->where('tahun', $request->tahun)->get()->first();


        // Jika pelanggan_id, bulan dan tahun yang diinput sudah tersedia di database
        if ($data) {
            // Kembali ke halaman dengan status 
            return back()->with('status', 'Data Penggunaan yang Diinput sudah tersedia!');
        }

        // Kurangi meter akhir dengan meter awal untuk mendapatkan jumlah meter
        $jumlah_meter = $request->meter_akhir - $request->meter_awal;

        // Ambil data tarif_id berdasarkan id pelanggan yang diinput
        $getTarifPelanggan = Pelanggan::find($request->pelanggan_id)->tarif_id;

        // Ambil harga tarif perkwh dari berdasarkan tarif_id tiap pelanggan
        $getTarif = Tarif::find($getTarifPelanggan)->tarif_perkwh;

        // Hitung jumlah bayar dengan mengkalikan jumlah_meter dan harga tarif_perkwh menggunakan function
        $bayar = DB::select('SELECT jumlah_bayar(' . $jumlah_meter . ',' . $getTarif . ') AS jumlah_bayar')[0]->jumlah_bayar;

        $dataTagihan = [
            'penggunaan_id'         => $request->id,
            'pelanggan_id'          => $request->pelanggan_id,
            'bulan'                 => $request->bulan,
            'tahun'                 => $request->tahun,
            'jumlah_meter'          => $jumlah_meter,
            'jumlah_bayar'          => $bayar,
            'status'                => 'belum bayar',
        ];

        $penggunaan =  Penggunaan::create($dataPenggunaan);
        $tagihan =  Tagihan::create($dataTagihan);
        Alert::success('Sukses', 'Tambah Data Penggunaan Berhasil !');

        return redirect('penggunaan');
    }

    /**
     * Menampilkan form untuk mengedit data penggunaan yang telah ditentukan.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Gate::allows('admin')) {

            $data = Tagihan::find($id);
            $penggunaan = $data->penggunaan_id;

            if ($data->status == 'diproses' || $data->status == 'dibayar') {

                Alert::warning('Perhatian', 'Data Yang Sedang Diproses / Sudah Dibayar Tidak dapat Diedit !');

                return back();
            }

            return view('admin.penggunaan_edit', compact('data'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memperbarui data penggunaan yang telah ditentukan di database.
     * Memperbarui data tagihan sesuai dengan data penggunaan yang telah ditentukan di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataPenggunaan = [
            'pelanggan_id'          => $request->pelanggan_id,
            'bulan'                 => $request->bulan,
            'tahun'                 => $request->tahun,
            'meter_awal'            => $request->meter_awal,
            'meter_akhir'           => $request->meter_akhir,
        ];

        $rules = [
            'meter_akhir'           => ['required'],
        ];
        $messages = [
            'meter_akhir.required'      => 'Meter Akhir wajib diisi.',
        ];

        $validator =  Validator::make($dataPenggunaan, $rules, $messages);
        $validator->validate();

        // Kurangi meter akhir dengan meter awal untuk mendapatkan jumlah meter
        $jumlah_meter = $request->meter_akhir - $request->meter_awal;

        // Ambil data tarif_id berdasarkan id pelanggan yang diinput
        $getTarifPelanggan = Pelanggan::find($request->pelanggan_id)->tarif_id;

        // Ambil harga tarif perkwh dari berdasarkan tarif_id tiap pelanggan
        $getTarif = Tarif::find($getTarifPelanggan)->tarif_perkwh;

        // Hitung jumlah bayar dengan mengkalikan jumlah_meter dan harga tarif_perkwh menggunakan function
        $bayar = DB::select('SELECT jumlah_bayar(' . $jumlah_meter . ',' . $getTarif . ') AS jumlah_bayar')[0]->jumlah_bayar;

        $dataTagihan = [
            'penggunaan_id'         => $id,
            'pelanggan_id'          => $request->pelanggan_id,
            'bulan'                 => $request->bulan,
            'tahun'                 => $request->tahun,
            'jumlah_meter'          => $jumlah_meter,
            'jumlah_bayar'          => $bayar,
            'status'                => 'belum bayar',
        ];

        $penggunaan = Penggunaan::whereId($id)->first();
        $penggunaan->update($dataPenggunaan);

        $tagihan = Tagihan::whereId($request->id)->first();
        $tagihan->update($dataTagihan);
        Alert::success('Sukses', 'Edit Data Penggunaan Berhasil !');

        return redirect('penggunaan');
    }

    /**
     * Menghapus data penggunaan yang telah ditentukan dari database.
     * Menghapus data tagihan sesuai dengan data penggunaan yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  
        if (Gate::allows('admin')) {
            $data = Tagihan::find($id);

            if ($data->status == 'diproses' || $data->status == 'dibayar') {

                Alert::warning('Perhatian', 'Data Yang Sedang Diproses / Sudah Dibayar Tidak dapat Dihapus !');

                return back();
            }

            Tagihan::whereId($id)->delete();
            Penggunaan::whereId($data->penggunaan_id)->delete();
            Alert::success('Sukses', 'Hapus Data Penggunaan Berhasil !');

            return redirect('penggunaan');
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
