<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman Kelola Pelanggan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Pelanggan.
 * Menggunakan Model Penggunaan.
 * Menggunakan Model Tarif.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pelanggan;
use App\Models\Penggunaan;
use App\Models\Tarif;

class PelangganController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data pelanggan dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Gate::allows('admin')) {

            $data = Pelanggan::all();

            return view('admin.pelanggan', compact('data'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan form untuk membuat data pelanggan baru.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Gate::allows('admin')) {

            $data = Pelanggan::max('nomor_meter') + 1;
            $tarif = Tarif::get();

            return view('admin.pelanggan_add', compact('data', 'tarif'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menyimpan data pelanggan yang baru dibuat di database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = [
            'nomor_meter'       => $request->nomor_meter,
            'nama_pelanggan'    => $request->nama_pelanggan,
            'alamat'            => $request->alamat,
            'tarif_id'          => $request->tarif_id,
        ];

        $rules = [
            'nama_pelanggan'    => ['required'],
            'alamat'            => ['required'],
            'tarif_id'          => ['required'],
        ];

        $messages = [
            'nama_pelanggan.required'     => 'Nama Pelanggan wajib diisi.',
            'alamat.required'             => 'Alamat wajib diisi.',
            'tarif_id.required'           => 'Tarif wajib diisi.',
        ];

        $validator =  Validator::make($data, $rules, $messages);
        $validator->validate();

        Pelanggan::create($data);
        Alert::success('Sukses', 'Tambah Data Pelanggan Berhasil !');

        return redirect('pelanggan');
    }

    /**
     * Menampilkan form untuk mengedit data pelanggan yang telah ditentukan.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Gate::allows('admin')) {

            $tarif = Tarif::get();
            $pelanggan = Pelanggan::find($id);

            return view('admin.pelanggan_edit', compact('tarif', 'pelanggan'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memperbarui data pelanggan yang telah ditentukan di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'nomor_meter'       => $request->nomor_meter,
            'nama_pelanggan'    => $request->nama_pelanggan,
            'alamat'            => $request->alamat,
            'tarif_id'          => $request->tarif_id,
        ];

        $rules = [
            'nama_pelanggan'    => ['required'],
            'alamat'            => ['required'],
        ];

        $messages = [
            'nama_pelanggan.required'     => 'Nama Pelanggan wajib diisi.',
            'alamat.required'             => 'Alamat wajib diisi.',
        ];

        $validator =  Validator::make($data, $rules, $messages);
        $validator->validate();

        $tarif = Pelanggan::whereId($id)->first();
        $tarif->update($data);
        Alert::success('Sukses', 'Edit Data Pelanggan Berhasil !');

        return redirect('pelanggan');
    }

    /**
     * Menghapus data pelanggan yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('admin')) {

            $data = Penggunaan::where('pelanggan_id', $id)->get()->first();

            if ($data) {

                Alert::warning('Perhatian', 'Data Pelanggan Mempunyai Relasi, Data Tidak dapat Dihapus!');

                return back();
            } else {

                Pelanggan::whereId($id)->delete();
                Alert::success('Sukses', 'Hapus Data Pelanggan Berhasil !');

                return redirect('pelanggan');
            }
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
