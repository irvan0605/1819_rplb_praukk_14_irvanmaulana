@extends('admin.layouts.app')

@section('title','List Tagihan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">List Tagihan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Tagihan</span>
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
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jumlah Meter</th>
                            <th>Jumlah Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tagihan as $data)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td> {{ $data->pelanggan->nomor_meter }} </td>
                            <td> {{ $data->pelanggan->nama_pelanggan }} </td>
                            <td> {{ $data->bulan }} </td>
                            <td> {{ $data->tahun }} </td>
                            <td> {{ $data->jumlah_meter }} </td>
                            <td> @currency($data->jumlah_bayar)</td>
                            <td>
                                @if ($data->status =='dibayar')
                                <button class="badge badge-success">Dibayar</button>
                                @else
                                <button class="badge badge-danger">Belum Bayar </button>
                                @endif
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