@extends('pelanggan.layouts.app')

@section('title','Detail Tagihan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class="py-3">Detail Tagihan</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Tagihan Pembayaran</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" value="{{ $data->pelanggan->nomor_meter }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Bulan Penggunaan</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="bulan_bayar" value="{{ $data->bulan }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tahun Penggunaan</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="tahun_bayar" value="{{ $data->tahun }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Awal</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="meter_awal" value="{{ $data->penggunaan->meter_awal }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Akhir</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="meter_akhir" value="{{ $data->penggunaan->meter_akhir }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Jumlah Meter</label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="jumlah_meter" value="{{ $data->jumlah_meter }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tarif/kWh</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                        <div class="col">
                            <input type="text" class="form-control" name="tarif" value="{{ $data->pelanggan->tarif->tarif_perkwh }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Jumlah Bayar</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                        <div class="col">
                            <input type="text" class="form-control" name="jumlah_bayar" value="{{ $data->jumlah_bayar }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Biaya Admin</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                        <div class="col">
                            <input type="text" class="form-control" name="biaya_admin" value="2000" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Total Bayar</label>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                        <div class="col">
                            <input type="number" class="form-control" name="total_bayar" value="{{ $total }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                    @include('pelanggan.bayar')
                </div>
            </div>
        </div>
    </div>


</div>

@endsection