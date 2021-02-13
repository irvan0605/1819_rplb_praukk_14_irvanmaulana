@extends('admin.layouts.app')

@section('title','Laporan Tagihan | Electric Payment')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
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
                    <span style="font-size: 18px;">Laporan Tagihan Bulan Januari Tahun 2021</span>
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
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Tarif/Daya</th>
                        <th>Jumlah Meter</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>32153211010</td>
                        <td>Sigit Nugroho</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/900VA</td>
                        <td>100</td>
                        <td>Rp. 100.000,-</td>
                        <td><a href="" class="btn btn-success">Sudah Bayar</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>32153211045</td>
                        <td>Ahmad Kurniawan</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R3/900VA</td>
                        <td>100</td>
                        <td>Rp. 150.000,-</td>
                        <td><a href="" class="btn btn-success">Sudah Bayar</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>32153211037</td>
                        <td>Harun</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R2/450VA</td>
                        <td>200</td>
                        <td>Rp. 150.000,-</td>
                        <td><a href="" class="btn btn-danger">Belum Bayar</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>32153211032</td>
                        <td>Bagas</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/450VA</td>
                        <td>100</td>
                        <td>Rp. 100.000,-</td>
                        <td><a href="" class="btn btn-danger">Belum Bayar</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>32153211054</td>
                        <td>Ferdiansyah</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/900VA</td>
                        <td>200</td>
                        <td>Rp. 280.000,-</td>
                        <td><a href="" class="btn btn-danger">Belum Bayar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection