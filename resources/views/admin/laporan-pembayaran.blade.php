@extends('admin.layouts.app')

@section('title','Laporan Pembayaran | Electric Payment')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3">Laporan Pembayaran</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Cari Berdasarkan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-4">
                        <select class="custom-select mr-sm-2">
                            <option selected>Pilih Bulan</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="3">April</option>
                            <option value="3"><i class="fa fa-medkit" aria-hidden="true"></i></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-4">
                        <select class="custom-select mr-sm-2">
                            <option selected>Pilih Tahun</option>
                            <option value="1">2020</option>
                            <option value="2">2021</option>
                            <option value="3">2022</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <a href="#" class="btn btn-primary">Tampilkan</a>
                        <a href="#" class="btn btn-danger">Reset</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Laporan Pembayaran Bulan Januari Tahun 2021</span>
                </div>
                <div class="col text-right">
                    <a href="tambah-inventaris" class="btn btn-warning">Cetak PDF </a>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr style="width: 100%;">
                        <th>No.</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Tagihan PLN</th>
                        <th>Biaya Admin</th>
                        <th>Total Bayar</th>
                        <th>Metode Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>32153211010</td>
                        <td>Sigit Nugroho</td>
                        <td>2020-01-31 </td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/900VA</td>
                        <td>100</td>
                        <td>Rp. 100.000,-</td>
                        <td>Mandiri</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>32153211045</td>
                        <td>Ahmad Kurniawan</td>
                        <td>2020-01-31 </td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R3/900VA</td>
                        <td>100</td>
                        <td>Rp. 150.000,-</td>
                        <td>BCA</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection