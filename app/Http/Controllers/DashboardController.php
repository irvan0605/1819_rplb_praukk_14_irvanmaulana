<?php

/**
 * Controller Untuk Menampilkan view Dashboard Untuk User Admin, Bank, dan Pelanggan.
 * @author Irvan Maulana.
 * @version 1.0.
 * @copyright 2021.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    /**
     * Menyaring HTTP Request yang masuk Pada saat User berhasil melakukan otentikasi.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan Dashboard Untuk User Admin, Bank, dan Pelanggan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('admin.index');
        } elseif (Gate::allows('bank')) {
            return view('bank.index');
        } elseif (Gate::allows('pelanggan')) {
            return view('pelanggan.index');
        } else {
            return abort(404);
        }
    }

    /**
     * Menampilkan Dashboard Untuk User Admin, Bank, dan Pelanggan.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        if (Gate::allows('admin')) {
            return view('admin.profile');
        } elseif (Gate::allows('bank')) {
            return view('bank.profile');
        } elseif (Gate::allows('pelanggan')) {
            return view('pelanggan.profile');
        } else {
            return abort(404);
        }
    }

    /**
     * Menampilkan Dashboard Untuk User Admin, Bank, dan Pelanggan.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // Validasi 
        $data = [
            'nama_user'     => $request->nama_user,
            'username'      => $request->username,
            'password'      => $request->password,
            'nomor_telepon' => $request->nomor_telepon,
            'foto'          => $request->foto
        ];

        // Cek Username Lama/Baru
        if ($request->username == Auth::user()->username) {
            $rules_username = ['required', 'min:5'];
        } else {
            $rules_username = ['required', 'min:5', 'unique:users'];
        }

        // Cek Foto Profile Lama/Baru
        if ($request->foto == null) {
            $rules_foto = [];
        } else {
            $rules_foto = ['mimes:jpeg,jpg,png,gif'];
        }

        $rules = [
            'nama_user'     => ['required'],
            'username'      => $rules_username,
            'nomor_telepon' => ['required', 'max:15', 'min:10'],
            'foto'          => $rules_foto
        ];
        $messages = [
            'nama_user.required'     => 'Nama wajib diisi.',
            'username.required'      => 'Username wajib diisi.',
            'username.min'           => 'Username minimal diisi dengan 5 karakter.',
            'username.unique'        => 'Username sudah terdaftar.',
            'nomor_telepon.required' => 'Nomor Telepon wajib diisi.',
            'nomor_telepon.max'      => 'Nomor Telepon maksimal diisi dengan 15 karakter.',
            'nomor_telepon.min'      => 'Nomor Telepon minimal diisi dengan 10 karakter.',
            'foto.mimes'             => 'Masukkan File berupa Gambar'
        ];

        $validator = Validator::make($data, $rules, $messages);
        $validator->validate();

        // Cek Foto Profile Lama/Baru
        if ($request->foto == null) {
            $foto =  Auth::user()->foto;
        } else {
            $foto = $request->file('foto')->store('img');
        }

        // Cek Password Lama/Baru
        if ($request->password == null) {
            $data = [
                'nama_user' => $request->nama_user,
                'username' => $request->username,
                'nomor_telepon' => $request->nomor_telepon,
                'foto' => $foto
            ];
        } else {
            $data = [
                'nama_user' => $request->nama_user,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'nomor_telepon' => $request->nomor_telepon,
                'foto' => $foto
            ];
        }


        if (Gate::allows('admin') || Gate::allows('bank') || Gate::allows('pelanggan')) {

            $user = User::whereId(Auth::user()->id)->first();
            $user->update($data);

            Alert::success('Sukses', 'Edit Data Profile Berhasil !');
            return back();
        } else {
            return abort(404);
        }
    }
}
