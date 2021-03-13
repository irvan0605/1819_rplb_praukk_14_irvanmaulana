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
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr>
                        <th id="klik">No.</th>
                        <th>Kode Tarif</th>
                        <th>Golongan</th>
                        <th>Daya</th>
                        <th>Tarif/kWh</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($data as $tarif)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $tarif->kode_tarif }}</td>
                        <td>{{ $tarif->golongan }}</td>
                        <td>{{ $tarif->daya }}</td>
                        <td> Rp. {{ number_format($tarif->tarif_perkwh, 0, ',','.') }} ,-</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>


</div>

@endsection