<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenggunaanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LogController;

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->back();
    }
    return view('index');
})->name('home');

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
Route::post('/profile/update', [DashboardController::class, 'update'])->name('profile.update');

Route::get('/tarif', [TarifController::class, 'index'])->name('tarif');
Route::get('/tarif/create', [TarifController::class, 'create'])->name('tarif.create');
Route::post('/tarif/store', [TarifController::class, 'store'])->name('tarif.store');
Route::get('/tarif/edit/{id}', [TarifController::class, 'edit'])->name('tarif.edit');
Route::post('/tarif/update/{id}', [TarifController::class, 'update'])->name('tarif.update');
Route::get('/tarif/delete/{id}', [TarifController::class, 'destroy'])->name('tarif.delete');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.delete');

Route::get('/penggunaan', [PenggunaanController::class, 'index'])->name('penggunaan');
Route::get('/penggunaan/create', [PenggunaanController::class, 'create'])->name('penggunaan.create');
Route::get('/findMeter', [PenggunaanController::class, 'findMeter'])->name('cari.meter');
Route::post('/penggunaan/store', [PenggunaanController::class, 'store'])->name('penggunaan.store');
Route::get('/penggunaan/edit/{id}', [PenggunaanController::class, 'edit'])->name('penggunaan.edit');
Route::post('/penggunaan/update/{id}', [PenggunaanController::class, 'update'])->name('penggunaan.update');
Route::get('/penggunaan/delete/{id}', [PenggunaanController::class, 'destroy'])->name('penggunaan.delete');

Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan');
Route::post('/tagihan', [TagihanController::class, 'cek_pelanggan'])->name('tagihan.cek');
Route::get('/detail/{id}', [PembayaranController::class, 'detailTagihan'])->name('tagihan.detail');
Route::post('/bayar', [PembayaranController::class, 'store'])->name('bayar');
Route::get('/transaksi', [PembayaranController::class, 'transaksi'])->name('transaksi');
Route::get('/transaksi/{id}', [PembayaranController::class, 'halamanKonfirmasi'])->name('transaksi.konfirmasi');
Route::post('/konfirmasi', [PembayaranController::class, 'konfirmasi'])->name('konfirmasi');

Route::get('/riwayat', [PembayaranController::class, 'riwayat'])->name('riwayat');
Route::get('/riwayat/detail/{id}', [PembayaranController::class, 'detailRiwayat'])->name('riwayat.detail');

Route::get('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('pembayaran');
Route::get('/pembayaran/detail/{id}', [PembayaranController::class, 'detailPembayaran'])->name('pembayaran.detail');
Route::post('/pembayaran/verifikasi/{id}', [PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');
Route::get('/cetak-struk/{id}', [PembayaranController::class, 'struk'])->name('cetak.struk');

Route::get('/laporan-tagihan', [TagihanController::class, 'laporan'])->name('laporan.tagihan');
Route::post('/laporan-tagihan', [TagihanController::class, 'cek_laporan'])->name('laporan.tagihan.cek');
Route::post('/laporan-tagihan/cetak', [TagihanController::class, 'cetak_laporan'])->name('laporan.tagihan.cetak');

Route::get('/laporan-pembayaran', [PembayaranController::class, 'laporan'])->name('laporan.pembayaran');
Route::post('/laporan-pembayaran', [PembayaranController::class, 'cek_laporan'])->name('laporan.pembayaran.cek');
Route::post('/laporan-pembayaran/cetak', [PembayaranController::class, 'cetak_laporan'])->name('laporan.pembayaran.cetak');

Route::get('/acivity-log', [LogController::class, 'index'])->name('activity-log');
Route::get('/log/{id}', [LogController::class, 'destroy'])->name('log.delete');
