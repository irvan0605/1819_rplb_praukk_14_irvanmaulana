@extends('bank.layouts.app')

@section('title','Riwayat Pembayaran | Electric Payment')

@section('content')

<div class="container-fluid">
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Bayar</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jumlah Meter</th>
                            <th>Total Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pembayaran as $data)

                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $data->nomor_meter }} </td>
                            <td> {{ ucfirst($data->nama_pelanggan) }} </td>
                            <td> {{ $data->tanggal_pembayaran }} </td>
                            <td> {{ ucfirst($data->bulan_bayar) }} </td>
                            <td> {{ $data->tahun_bayar }} </td>
                            <td> {{ $data->jumlah_meter }} </td>
                            <td> @currency($data->total_bayar)</td>
                            <td>
                                <a href="{{ route('riwayat.detail', $data->id) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>


</div>

@endsection