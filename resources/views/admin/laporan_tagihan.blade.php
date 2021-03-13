@extends('admin.layouts.app')

@section('title','Laporan Tagihan | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Laporan Tagihan</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cari Berdasarkan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('laporan.tagihan.cek') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" name="bulan">
                            <option value="">Pilih Bulan..</option>
                            <option value="januari">Januari</option>
                            <option value="februari">Februari</option>
                            <option value="maret">Maret</option>
                            <option value="april">April</option>
                            <option value="mei">Mei</option>
                            <option value="juni">Juni</option>
                            <option value="juli">Juli</option>
                            <option value="agustus">Agustus</option>
                            <option value="september">September</option>
                            <option value="oktober">Oktober</option>
                            <option value="november">November</option>
                            <option value="desember">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-4">
                        <select class="custom-select mr-sm-2" name="tahun">
                            <option value="">Pilih tahun..</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <button type="submit" name="tampilkan" class="btn btn-primary">Tampilkan</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    @isset ($_POST['tampilkan'])
    <div class="card mb-5">
        <div class="card-header bg-white {{ !isset($_POST['tampilkan']) ? 'd-none' : '' }}">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Laporan Tagihan Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }}</span>
                </div>
                <div class="col text-right">
                    <form action="{{ route('laporan.tagihan.cetak') }}" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="bulan" value="{{ $bulan }}">
                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                        <button type="submit" class="btn btn-warning">Cetak PDF </button>
                    </form>
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
                        <th>Tarif/Daya</th>
                        <th>Jumlah Meter</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($tagihan as $data)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $data->pelanggan->nomor_meter }}</td>
                        <td>{{ ucfirst($data->pelanggan->nama_pelanggan) }}</td>
                        <td>{{ $data->pelanggan->tarif->kode_tarif }}</td>
                        <td>{{ $data->jumlah_meter }}</td>
                        <td>Rp. {{ number_format($data->jumlah_bayar, 0, ',','.') }},-</td>
                        <td>
                            @if ($data->status =='dibayar')
                            <button class="btn btn-success">{{ ucfirst($data->status) }} </button>
                            @else
                            <button class="btn btn-danger">Belum Bayar </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    @endisset


</div>

@endsection