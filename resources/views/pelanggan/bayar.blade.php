@extends('pelanggan.layouts.app')

@section('title','Bayar | Electric Payment')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3">Bayar</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Detail Pembayaran</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="32153211010" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Bulan Penggunaan</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="Januari" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tahun Penggunaan</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="2021" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Awal</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="0" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Akhir</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="100" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Jumlah Meter</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="100" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tarif/kWh</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="1000" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Jumlah Bayar</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="100000" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Biaya Admin</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="2000" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Total Bayar</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="102000" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2">
                            <option selected>Pilih Metode</option>
                            <option value="1">Mandiri</option>
                            <option value="2">BCA</option>
                            <option value="3">BRI</option> q
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                        <a href="#" class="btn btn-primary">Bayar</a>
                    </div>

                </div>
            </form>
        </div>
    </div>


</div>

@endsection