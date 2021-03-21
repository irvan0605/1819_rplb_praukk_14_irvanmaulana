<?php

/**
 * Controller Untuk Menghubungkan Model dengan View Halaman Kelola Tarif.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

/**
 * Menggunakan Model Tarif.
 * Menggunakan Model Pelanggan.
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Tarif;
use App\Models\Pelanggan;

class TarifController extends Controller
{
    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan data tarif dari database.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {

            $data = Tarif::all();

            return view('admin.tarif', compact('data'));
        } elseif (Gate::allows('pelanggan')) {

            $data = Tarif::all();

            return view('pelanggan.tarif', compact('data'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menampilkan form untuk membuat data tarif baru.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin')) {

            return view('admin.tarif_add');
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Menyimpan data tarif yang baru dibuat di database.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'kode_tarif'   => $request->golongan . '/' . $request->daya,
            'golongan'     => $request->golongan,
            'daya'         => $request->daya,
            'tarif_perkwh' => $request->tarif_perkwh,
        ];

        $rules = [
            'kode_tarif'    => ['unique:tarif'],
            'golongan'      => ['required'],
            'daya'          => ['required'],
            'tarif_perkwh'  => ['required'],
        ];

        $messages = [
            'kode_tarif.unique'      => 'Golongan dan Daya sudah tersedia.',
            'golongan.required'      => 'Golongan wajib diisi.',
            'daya.required'          => 'Daya wajib diisi.',
            'tarif_perkwh.required'  => 'Tarif wajib diisi.',
        ];

        $validator =  Validator::make($data, $rules, $messages);
        $validator->validate();

        $tarif = Tarif::create($data);
        Alert::success('Sukses', 'Tambah Data Tarif Berhasil !');

        return redirect('tarif');
    }

    /**
     * Menampilkan form untuk mengedit data tarif yang telah ditentukan.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admin')) {

            $tarif = Tarif::find($id);

            return view('admin.tarif_edit', compact('tarif'));
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }

    /**
     * Memperbarui data tarif yang telah ditentukan di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'kode_tarif'   => $request->golongan . '/' . $request->daya,
            'golongan'     => $request->golongan,
            'daya'         => $request->daya,
            'tarif_perkwh' => $request->tarif_perkwh,
        ];

        $getTarif = Tarif::find($id);
        if ($data['kode_tarif'] == $getTarif['kode_tarif']) {
            $rules_kode = ['required'];
        } else {
            $rules_kode = ['required', 'unique:tarif'];
        }

        $rules = [
            'kode_tarif'    => $rules_kode,
            'golongan'      => ['required'],
            'tarif_perkwh'  => ['required'],
        ];

        $messages = [
            'kode_tarif.unique'      => 'Golongan dan Daya sudah tersedia.',
            'golongan.required'      => 'Golongan wajib diisi.',
            'tarif_perkwh.required'  => 'Tarif wajib diisi.',
        ];

        $validator =  Validator::make($data, $rules, $messages);
        $validator->validate();

        $tarif = Tarif::whereId($id)->first();
        $tarif->update($data);

        Alert::success('Sukses', 'Edit Data Tarif Berhasil !');
        return redirect('tarif');
    }

    /**
     * Menghapus data tarif yang telah ditentukan dari database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Gate::allows('admin')) {
            $data = Pelanggan::where('tarif_id', $id)->get()->first();

            if ($data) {

                Alert::warning('Perhatian', 'Data Tarif Mempunyai Relasi, Data Tidak dapat Dihapus!');

                return back();
            } else {
                Tarif::whereId($id)->delete();
                Alert::success('Sukses', 'Hapus Data Tarif Berhasil !');

                return back();
            }
        } else {
            return abort(403, 'Anda Tidak Memiliki Hak Akses!');
        }
    }
}
