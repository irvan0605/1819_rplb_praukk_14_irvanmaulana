@extends('admin.layouts.app')

@section('title','Kelola Pelanggan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Kelola Pelanggan</h3>
    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Pelanggan</span>
                </div>
                <div class="col text-right">
                    <a href="{{route('pelanggan.create')}}" class="btn btn-warning text-white"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" width="100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Tarif/Daya</th>
                            <th style="width: 12%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $pelanggan)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $pelanggan->nomor_meter }}</td>
                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->tarif->kode_tarif  }}</td>
                            <td><a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('pelanggan.delete', $pelanggan->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection