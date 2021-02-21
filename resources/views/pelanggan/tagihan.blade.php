@extends('pelanggan.layouts.app')

@section('title','Tagihan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Tagihan</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cek Tagihan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ID Pelanggan</label>
                    <div class="col-5 pr-0">
                        <input type="number" class="form-control" placeholder="Masukkan ID Pelanggan">

                    </div>
                    <dic class="col-1 pl-0">
                        <button class="btn btn-primary">Cari</button>
                    </dic>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Pelanggan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>ID Pelanggan</th>
                            <td class="px-3">:</td>
                            <td>32153211010</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td class="px-3">:</td>
                            <td>Sigit Nugroho</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td class="px-3">:</td>
                            <td>Jl. Durian No.8 Bekasi</td>
                        </tr>
                        <tr>
                            <th>Tarif/Daya</th>
                            <td class="px-3">:</td>
                            <td>R1/900VA</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Tagihan</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th>No.</th>
                        <th>ID Pelanggan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Jumlah Meter</th>
                        <th>Tarif/kWh</th>
                        <th>Jumlah Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>32153211010</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>0</td>
                        <td>100</td>
                        <td>100</td>
                        <td>Rp. 1.000,-</td>
                        <td>Rp. 100.000,-</td>
                        <td>
                            <a href="bayar" class="btn btn-success">Bayar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection