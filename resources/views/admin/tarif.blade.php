@extends('admin.layouts.app')

@section('title','Kelola Tarif | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Kelola Tarif</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Tarif</span>
                </div>
                <div class="col text-right">
                    <a href="{{ route('tarif.create') }}" class="btn btn-warning text-white"><i class="fa fa-plus"></i> Tambah Tarif</a>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Tarif</th>
                            <th>Golongan</th>
                            <th>Daya</th>
                            <th>Tarif/kWh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $tarif)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $tarif->kode_tarif }}</td>
                            <td>{{ $tarif->golongan }}</td>
                            <td>{{ $tarif->daya }}</td>
                            <td>@currency($tarif->tarif_perkwh)</td>
                            <td><a href="{{ route('tarif.edit', $tarif->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('tarif.delete', $tarif->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-trash"></i></a>
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