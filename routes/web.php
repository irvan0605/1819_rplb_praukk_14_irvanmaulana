<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('homepage.index');
// })->name('home');

Route::view('/', 'homepage.index')->name('home');
Route::view('about', 'homepage.about')->name('about');
Route::view('login', 'homepage.login')->name('login');
Route::view('register', 'homepage.register');

Route::view('dashboard', 'admin.index')->name('dashboard');
Route::view('pelanggan', 'admin.pelanggan')->name('pelanggan');
Route::view('tarif', 'admin.tarif')->name('tarif');
Route::view('penggunaan', 'admin.penggunaan')->name('penggunaan');
Route::view('tagihan', 'admin.tagihan')->name('tagihan');
Route::view('riwayat', 'admin.riwayat')->name('riwayat');
Route::view('laporan-tagihan', 'admin.laporan-tagihan')->name('laporan-tagihan');
Route::view('laporan-pembayaran', 'admin.laporan-pembayaran')->name('laporan-pembayaran');

Route::view('dashboard-bank', 'bank.index')->name('dashboard');
Route::view('pembayaran', 'bank.pembayaran')->name('pembayaran');
Route::view('riwayat-bank', 'bank.riwayat')->name('riwayat');
Route::view('laporan-pembayaran-bank', 'bank.laporan-pembayaran')->name('laporan-pembayaran');

Route::view('dashboard-pelanggan', 'pelanggan.index')->name('dashboard');
Route::view('tagihan-pelanggan', 'pelanggan.tagihan')->name('tagihan');
Route::view('bayar', 'pelanggan.bayar')->name('bayar');
Route::view('tarif-pelanggan', 'pelanggan.tarif')->name('tarif');
Route::view('riwayat-pelanggan', 'pelanggan.riwayat')->name('riwayat');
