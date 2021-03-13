@extends('admin.layouts.app')

@section('title','Kelola Penggunaan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Kelola Penggunaan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Penggunaan</span>
                </div>
                <div class="col text-right">
                    <a href="{{ route('penggunaan.create') }}" class="btn btn-warning text-white"><i class="fa fa-plus"></i> Input Penggunaan</a>
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
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($penggunaan as $data)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td> {{ $data->pelanggan->nomor_meter }} </td>
                        <td> {{ ucfirst($data->pelanggan->nama_pelanggan) }} </td>
                        <td> {{ ucfirst($data->penggunaan->bulan) }} </td>
                        <td> {{ $data->penggunaan->tahun }} </td>
                        <td> {{ $data->penggunaan->meter_awal }} </td>
                        <td> {{ $data->penggunaan->meter_akhir }} </td>
                        <td><a href="{{ route('penggunaan.edit', $data->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('penggunaan.delete', $data->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash"></i></a>
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