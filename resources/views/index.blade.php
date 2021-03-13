<!-- Ekstend ke layouts/app -->
@extends('layouts.app')

<!-- Judul Halaman -->
@section('title', 'Electric Payment')

<!-- Isi Halaman Index -->
@section('content')

<div class="bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <img src="/assets/img/logo.png" class="mt-4" alt="" width="200">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-md-8 col-lg-6 text-center">
                <h1 class="text-white">Bayar Listrik Lebih Mudah dengan Electric Payment</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-md-8 col-lg-6 text-center">
                <p class="text-white" style="font-size: 24px;">Kami Membantu Anda Mempercepat Proses Pembayaran Listrik Pasca Bayar</p>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-md-8 col-lg-6 text-center">
                <a href="/register" class="btn btn-primary rounded-pill px-5 py-2 opacity" style="font-size: 20px">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Isi Halaman -->
@endsection