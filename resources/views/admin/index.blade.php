@extends('admin.layouts.app')

@section('title','Dashboard | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Dashboard</h3>

    <div class="row">
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-success rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Profile</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-user-cog icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="#" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-primary rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Pelanggan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-users icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('pelanggan')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-danger rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Tarif</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-briefcase icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('tarif')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3">
            <div class="box bg-info rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Kelola Penggunaan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-tasks icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('penggunaan')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-dark rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">List Tagihan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-money-bill-wave-alt icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('tagihan')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-secondary rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Riwayat Pembayaran</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-history icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('riwayat')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3 pr-lg-0">
            <div class="box bg-light rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-dark">Laporan Tagihan</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas  fa-money-check-alt icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{route('laporan.tagihan')}}" class="btn btn-primary box-footer text-dark" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 pb-3">
            <div class="box bg-warning rounded">
                <div class="row">
                    <div class="col-6 col-lg-5 col-xl-6">
                        <h6 class="pl-3 pt-5 text-white">Laporan Pembayaran</h6>
                    </div>
                    <div class="col-6">
                        <i class="fas fa-wallet icon py-3" style="font-size: 70px;"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{route('laporan.pembayaran')}}" class="btn btn-primary box-footer" style="width: 100%;">Lihat Rincian<i class="fas fa-arrow-circle-right pl-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection