@extends('pelanggan.layouts.app')

@section('title','Riwayat Transaksi | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Riwayat Transaksi</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Riwayat Transaksi Pembayaran</span>
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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($pembayaran as $data)
                    @if($data->status =='sukses' || $data->status =='diproses')
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $data->pelanggan->nomor_meter }} </td>
                        <td> {{ ucfirst($data->pelanggan->nama_pelanggan) }} </td>
                        <td> {{ $data->tanggal_pembayaran }} </td>
                        <td> {{ ucfirst($data->bulan_bayar) }} </td>
                        <td> {{ $data->tahun_bayar }} </td>
                        <td> Rp. {{ number_format($data->total_bayar, 0, ',','.') }},-</td>
                        <td>
                            @if ($data->status == 'diproses')
                            <span class="badge badge-info">Menunggu Konfirmasi</span>
                            @else
                            <span class="badge badge-success">Sukses</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('riwayat.detail', $data->id) }}" class="btn btn-primary">Detail</a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>


</div>

@endsection