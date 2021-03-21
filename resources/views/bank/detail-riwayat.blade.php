@extends('bank.layouts.app')

@section('title','Detail Riwayat | Electric Payment')

@section('content')

<div class="container-fluid">
    <h3 class=" py-3">Detail Riwayat Transaksi</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Riwayat Transaksi Pembayaran</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table>
                        <tr>
                            <th class="pb-3">ID Pelanggan</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->pelanggan->nomor_meter }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Nama Pelanggan</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->pelanggan->nama_pelanggan }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Alamat</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->pelanggan->alamat }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Tarif/Daya</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->pelanggan->tarif->kode_tarif }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Tanggal Pembayaran</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->tanggal_pembayaran }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Bulan</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->bulan_bayar }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Tahun</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->tahun_bayar }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Meter Awal</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->tagihan->penggunaan->meter_awal }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Meter Akhir</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->tagihan->penggunaan->meter_akhir }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Jumlah Meter</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">{{ $pembayaran->tagihan->jumlah_meter }}</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Tarif/kWh</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">@currency($pembayaran->pelanggan->tarif->tarif_perkwh)</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Jumlah Bayar</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">@currency($pembayaran->tagihan->jumlah_bayar)</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Biaya Admin</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">@currency($pembayaran->biaya_admin)</td>
                        </tr>
                        <tr>
                            <th class="pb-3">Total Bayar</th>
                            <td class="px-3 pb-3">:</td>
                            <td class="pb-3">@currency($pembayaran->total_bayar)</td>
                        </tr>
                        <tr>
                            <th class="pb-5">Bukti Pembayaran</th>
                            <td class="px-3 pb-5">:</td>
                            <td class="pb-5"><img src="/storage/{{$pembayaran->bukti_bayar}}" alt="" class="img-thumbnail" style="width: 200px;"></td>
                        </tr>
                    </table>
                    <a href="{{ route('riwayat') }}" class="btn btn-warning">Kembali</a>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection