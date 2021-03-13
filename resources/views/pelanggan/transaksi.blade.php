@extends('pelanggan.layouts.app')

@section('title','Transaksi | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Konfirmasi Transaksi</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Konfirmasi Transaksi Pembayaran</span>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th id="klik">No.</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Total Bayar</th>
                        <th>Metode Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($pembayaran as $data)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $data->pelanggan->nomor_meter }} </td>
                        <td> {{ ucfirst($data->pelanggan->nama_pelanggan) }} </td>
                        <td> {{ $data->tanggal_pembayaran }} </td>
                        <td> {{ ucfirst($data->bulan_bayar) }} </td>
                        <td> {{ $data->tahun_bayar }} </td>
                        <td> Rp. {{ number_format($data->total_bayar, 0, ',','.') }},-</td>
                        <td>Bank {{ ucfirst($data->metode->nama_metode) }} </td>
                        <td>
                            <a href="{{ route('transaksi.konfirmasi', $data->id) }}" class="btn btn-primary">Konfirmasi</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>


</div>

@endsection