@extends('bank.layouts.app')

@section('title','Riwayat Pembayaran | Electric Payment')

@section('content')

<div class="container-fluid" style="min-height: 82.5vh;">
    <h3 class=" py-3">Riwayat Pembayaran</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Riwayat Pembayaran</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th>No.</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Jumlah Meter</th>
                        <th>Tagihan PLN</th>
                        <th>Biaya Admin</th>
                        <th>Total Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>32153211010</td>
                        <td>Sigit Nugroho</td>
                        <td>2020-01-31 </td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>100</td>
                        <td>Rp. 100.000,-</td>
                        <td>Rp. 2.000,-</td>
                        <td>Rp. 102.000,-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection