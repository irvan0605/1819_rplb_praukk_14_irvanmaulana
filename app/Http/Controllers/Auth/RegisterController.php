<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        Alert::success('Sukses', 'Registrasi Berhasil !');
        return redirect('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'nama_user' => ['required'],
            'username' => ['required', 'min:5', 'unique:users'],
            'password' => ['required', 'min:5', 'confirmed'],
            'nomor_telepon' => ['required', 'max:15', 'min:10']
        ];

        $messages = [
            'nama_user.required'     => 'Nama wajib diisi.',
            'username.required'      => 'Username wajib diisi.',
            'username.min'           => 'Username minimal diisi dengan 5 karakter.',
            'username.unique'        => 'Username sudah terdaftar.',
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal diisi dengan 5 karakter.',
            'password.confirmed'     => 'Konfirmasi password tidak sesuai.',
            'nomor_telepon.required' => 'Nomor Telepon wajib diisi.',
            'nomor_telepon.max'      => 'Nomor Telepon maksimal diisi dengan 15 karakter.',
            'nomor_telepon.min'      => 'Nomor Telepon minimal diisi dengan 10 karakter.',
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nama_user' => $data['nama_user'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'nomor_telepon' => $data['nomor_telepon'],
            'foto' => 'img/profile.jpg',
            'level_id' => 3,
        ]);
    }
}
