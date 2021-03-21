@extends('bank.layouts.app')

@section('title','Pembayaran | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Pembayaran</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Verifikasi Pembayaran</span>
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
                            <th>Tagihan PLN</th>
                            <th>Biaya Admin</th>
                            <th>Total Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($pembayaran as $data)

                        @if ($data->status == 'diproses')

                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $data->pelanggan->nomor_meter }}</td>
                            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
                            <td>{{ $data->tanggal_pembayaran }}</td>
                            <td>{{ $data->bulan_bayar }}</td>
                            <td>{{ $data->tahun_bayar }}</td>
                            <td> Rp. {{ number_format($data->tagihan->jumlah_bayar, 0, ',','.') }} ,-</td>
                            <td> Rp. {{ number_format($data->biaya_admin, 0, ',','.') }} ,-</td>
                            <td> Rp. {{ number_format($data->total_bayar, 0, ',','.') }} ,-</td>
                            <td>
                                <a href="{{ route('pembayaran.detail', $data->id) }}" class="btn btn-primary">Verifikasi</i></a>
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


</div>

@endsection