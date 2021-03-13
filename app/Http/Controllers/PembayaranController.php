<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman yang Berkaitan dengan Pembayaran.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Pembayaran.
 * Menggunakan Model Penggunaan.
 * Menggunakan Model Tagihan.
 * Menggunakan Model Metode.
 * Menggunakan Model Log.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use PDF;
use Alert;
use App\Models\Pembayaran;
use App\Models\Penggunaan;
use App\Models\Tagihan;
use App\Models\Metode;
use App\Models\Log;

class PembayaranController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data detail tagihan yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailTagihan($id)
    {
        //
        if (Gate::allows('pelanggan')) {

            $data = Tagihan::find($id);
            $total = $data->jumlah_bayar + 2000;

            return view('pelanggan.detail-tagihan', compact('data', 'total'));
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menyimpan data pembayaran berdasarkan data tagihan yang ditentukan di database.
     * Memperbarui status data tagihan
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'tagihan_id'            => $request->tagihan,
            'pelanggan_id'          => $request->pelanggan,
            'tanggal_pembayaran'    => date('Y-m-d H:i:s'),
            'bulan_bayar'           => $request->bulan,
            'tahun_bayar'           => $request->tahun,
            'biaya_admin'           => $request->biaya_admin,
            'total_bayar'           => $request->total_bayar,
            'metode_id'             => $request->metode,
            'status'                => 'konfirmasi',
            'bukti_bayar'           => '',
            'user_id'               => Auth::user()->id,
        ];

        DB::beginTransaction();
        try {

            $pembayaran = Pembayaran::create($data);

            DB::select('CALL updateStatusTagihan(' . $request->tagihan . ')');

            Log::create([
                'nama_log'  => 'BAYAR',
                'tabel' => 'Tagihan',
                'id_referensi' => $request->tagihan,
                'user_id' => Auth::user()->id,
                'deskripsi' => 'Membayar Transaksi Tagihan',
            ]);

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();
        }
        if (empty($e)) {

            Alert::info('Selesaikan Pembayaran', 'Silahkan Konfirmasi Pembayaran Anda !');

            return redirect('transaksi');
        } else {

            Alert::warning('Gagal', 'Gagal Melakukan Pembayaran');

            return redirect('tagihan');
        }
    }

    /**
     * Menampilkan data pembayaran yang mempunyai status konfirmasi dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaksi()
    {
        //
        if (Gate::allows('pelanggan')) {

            $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->where('status', 'konfirmasi')->get();

            return view('pelanggan.transaksi', compact('pembayaran'));
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }


    /**
     * Menampilkan data pembayaran yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function halamanKonfirmasi($id)
    {
        //
        if (Gate::allows('pelanggan')) {

            $data = Pembayaran::find($id);

            return view('pelanggan.konfirmasi', compact('data'));
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menyimpan data pembayaran yang telah dikonfirmasi di database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi(Request $request)
    {
        $data = [
            'bukti_bayar' => $request->bukti_bayar
        ];
        $rules = [
            'bukti_bayar' => 'required|mimes:jpeg,jpg,png,gif'
        ];
        $messages = [
            'bukti_bayar.required' => 'Bukti Pembayaran Harus Diisi',
            'bukti_bayar.mimes' => 'Masukkan File berupa Gambar'
        ];

        $validator = Validator::make($data, $rules, $messages);
        $validator->validate();

        $pembayaran = Pembayaran::whereId($request->id)->first();
        $pembayaran->update([
            'status' => 'diproses',
            'bukti_bayar' => $request->file('bukti_bayar')->store('img'),
        ]);

        Log::create([
            'nama_log'  => 'INSERT',
            'tabel' => 'Pembayaran',
            'id_referensi' => $request->id,
            'user_id' => Auth::user()->id,
            'deskripsi' => 'Konfirmasi Transaksi Pembayaran',
        ]);

        Alert::success('Berhasil', 'Transaksi Anda Sedang Diproses !');

        return redirect('riwayat');
    }

    /**
     * Menampilkan data pembayaran yang sudah dikonfirmasi di database.
     *
     * @return \Illuminate\Http\Response
     */
    public function pembayaran()
    {
        //
        if (Gate::allows('bank')) {

            $bank = Metode::where('user_id', Auth::user()->id)->get()->first();
            $pembayaran = Pembayaran::where('metode_id', $bank->id)->get();

            return view('bank.pembayaran', compact('pembayaran'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan data pembayaran yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailPembayaran($id)
    {
        //
        if (Gate::allows('bank')) {

            $pembayaran = Pembayaran::find($id);

            return view('bank.detail-pembayaran', compact('pembayaran'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memverifikasi data pembayaran yang telah ditentukan didatabase.
     * Memperbarui status data pembayaran menjadi sukses.
     * Memperbarui status data tagihan menjadi dibayar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifikasi($id)
    {
        //
        $pembayaran = Pembayaran::whereId($id)->first();
        $pembayaran->update([
            'status' => 'sukses'
        ]);

        $tagihan = Tagihan::whereId($pembayaran->tagihan_id)->first();
        $tagihan->update([
            'status' => 'dibayar'
        ]);

        Log::create([
            'nama_log'  => 'VERIFIKASI',
            'tabel' => 'Pembayaran',
            'id_referensi' => $id,
            'user_id' => Auth::user()->id,
            'deskripsi' => 'Verifikasi Transaksi Pembayaran',
        ]);

        Alert::success('Sukses', 'Verifikasi Pembayaran Berhasil !');

        return redirect('pembayaran');
    }

    /**
     * Menampilkan riwayat data pembayaran dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        if (Gate::allows('admin')) {

            $pembayaran = DB::select('SELECT * FROM riwayat ORDER by id DESC');

            return view('admin.riwayat', compact('pembayaran'));
        } elseif (Gate::allows('bank')) {

            $bank = Metode::where('user_id', Auth::user()->id)->get()->first();

            $pembayaran = DB::select('SELECT * FROM riwayat WHERE metode_id = ' . $bank->id . ' ORDER by id DESC');

            return view('bank.riwayat', compact('pembayaran'));
        } elseif (Gate::allows('pelanggan')) {

            $pembayaran = Pembayaran::where('user_id', Auth::user()->id)->get();

            return view('pelanggan.riwayat', compact('pembayaran'));
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan riwayat data pembayaran yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailRiwayat($id)
    {
        //
        if (Gate::allows('admin')) {

            $pembayaran = Pembayaran::find($id);

            return view('admin.detail-riwayat', compact('pembayaran'));
        } elseif (Gate::allows('pelanggan')) {

            $pembayaran = Pembayaran::find($id);

            return view('pelanggan.detail-riwayat', compact('pembayaran'));
        } elseif (Gate::allows('bank')) {

            $pembayaran = Pembayaran::find($id);

            return view('bank.detail-riwayat', compact('pembayaran'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan halaman data laporan pembayaran.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan()
    {
        //
        if (Gate::allows('admin')) {

            return view('admin.laporan_pembayaran');
        } elseif (Gate::allows('bank')) {

            return view('bank.laporan_pembayaran');
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memeriksa data laporan Pembayaran.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cek_laporan(Request $request)
    {
        //
        if (Gate::allows('admin')) {

            if (!$request->bulan && !$request->tahun) {
                return back()->with('status', 'Bulan dan Tahun Wajib Diisi');
            } elseif (!$request->tahun) {
                return back()->with('status', 'Tahun Wajib Diisi');
            } elseif (!$request->bulan) {
                return back()->with('status', 'Bulan Wajib Diisi');
            } else {

                $bulan = $request->bulan;
                $tahun = $request->tahun;
                $pembayaran = Pembayaran::where('bulan_bayar', $bulan)->where('tahun_bayar', $tahun)->orderBy('id', 'DESC')->where('status', 'sukses')->get();

                return view('admin.laporan_pembayaran', compact('pembayaran', 'bulan', 'tahun'));
            }
        } elseif (Gate::allows('bank')) {

            if (!$request->bulan && !$request->tahun) {

                return back()->with('status', 'Bulan dan Tahun Wajib Diisi');
            } elseif (!$request->tahun) {

                return back()->with('status', 'Tahun Wajib Diisi');
            } elseif (!$request->bulan) {

                return back()->with('status', 'Bulan Wajib Diisi');
            } else {

                $bulan = $request->bulan;
                $tahun = $request->tahun;
                $bank = Metode::where('user_id', Auth::user()->id)->get()->first();

                $pembayaran = Pembayaran::where('bulan_bayar', $bulan)->where('tahun_bayar', $tahun)->where('metode_id', $bank->id)->orderBy('id', 'DESC')->where('status', 'sukses')->get();

                return view('bank.laporan_pembayaran', compact('pembayaran', 'bulan', 'tahun'));
            }
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Mencetak data laporan pembayaran menjadi pdf.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cetak_laporan(Request $request)
    {
        if (Gate::allows('admin')) {

            $bulan = $request->bulan;
            $tahun = $request->tahun;

            $pembayaran = Pembayaran::where('bulan_bayar', $bulan)->where('tahun_bayar', $tahun)->orderBy('id', 'DESC')->get();

            $pdf = PDF::loadView('admin.laporan_pembayaran_pdf', compact('pembayaran', 'bulan', 'tahun'))->setPaper('a4', 'landscape');

            return $pdf->stream();
        } elseif (Gate::allows('bank')) {

            $bulan = $request->bulan;
            $tahun = $request->tahun;
            $metode = Metode::where('user_id', Auth::user()->id)->get()->first();

            $pembayaran = Pembayaran::where('bulan_bayar', $bulan)->where('tahun_bayar', $tahun)->where('metode_id', $metode->id)->orderBy('id', 'DESC')->get();
            $bank = $metode->nama_metode;

            $pdf = PDF::loadView('bank.laporan_pembayaran_pdf', compact('pembayaran', 'bulan', 'tahun', 'bank'))->setPaper('a4', 'landscape');

            return $pdf->stream();
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Mencetak struk data pembayaran yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function struk($id)
    {
        if (Gate::allows('pelanggan')) {

            $pembayaran = Pembayaran::find($id);
            $tagihan = Tagihan::find($pembayaran->id);
            $penggunaan = Penggunaan::find($tagihan->id);

            $meter = new Penggunaan();
            $meter_awal = $meter->formatMeter($penggunaan->meter_awal);
            $meter_akhir = $meter->formatMeter($penggunaan->meter_akhir);

            $pdf = PDF::loadView('pelanggan.struk', compact('pembayaran', 'meter_awal', 'meter_akhir'))->setPaper('a4', 'landscape');

            return $pdf->stream();
        } else {

            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
