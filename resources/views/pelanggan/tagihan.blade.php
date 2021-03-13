@extends('pelanggan.layouts.app')

@section('title','Tagihan | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Tagihan</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cek Tagihan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tagihan.cek') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ID Pelanggan</label>
                    <div class="col-5 pr-0">
                        <input type="number" class="form-control" name="pelanggan" placeholder="Masukkan ID Pelanggan">
                    </div>
                    <div class="col-1 pl-0">
                        <button class="btn btn-primary" name="cari">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($_POST['cari']))
    <div class="card mb-2 {{ !isset($_POST['cari']) ? 'd-none' : '' }}">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Pelanggan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th>ID Pelanggan</th>
                            <td class="px-3">:</td>
                            <td>{{ $detail_pelanggan->pelanggan->nomor_meter }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td class="px-3">:</td>
                            <td>{{ ucfirst($detail_pelanggan->pelanggan->nama_pelanggan) }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td class="px-3">:</td>
                            <td>{{ $detail_pelanggan->pelanggan->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Tarif/Daya</th>
                            <td class="px-3">:</td>
                            <td>{{ $detail_pelanggan->pelanggan->tarif->kode_tarif }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card {{ !isset($_POST['cari']) ? 'd-none' : '' }} mb-5">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Tagihan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th id="klik">No.</th>
                        <th>ID Pelanggan</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Jumlah Meter</th>
                        <th>Tarif/kWh</th>
                        <th>Jumlah Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($detail_tagihan as $data)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $data->pelanggan->nomor_meter }}</td>
                        <td>{{ ucfirst($data->bulan) }}</td>
                        <td>{{ $data->tahun }}</td>
                        <td>{{ $data->penggunaan->meter_awal }}</td>
                        <td>{{ $data->penggunaan->meter_akhir }}</td>
                        <td>{{ $data->jumlah_meter }}</td>
                        <td>Rp. {{ number_format($data->pelanggan->tarif->tarif_perkwh, 0, ',','.') }},-</td>
                        <td>Rp. {{ number_format($data->jumlah_bayar, 0, ',','.') }},-</td>
                        <td>
                            <a href="{{ route('tagihan.detail', $data->id) }}" class="btn btn-primary">
                                Bayar</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>


    @endif


</div>

@endsection