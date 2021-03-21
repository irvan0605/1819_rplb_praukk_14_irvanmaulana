@extends('pelanggan.layouts.app')

@section('title','Tarif | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Tarif</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Daftar Tarif</span>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $tarif)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $tarif->kode_tarif }}</td>
                            <td>{{ $tarif->golongan }}</td>
                            <td>{{ $tarif->daya }}</td>
                            <td>{{ $tarif->tarif_perkwh }}</td>
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