@extends('admin.layouts.app')

@section('title','Kelola Penggunaan | Electric Payment')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3">Kelola Penggunaan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Penggunaan</span>
                </div>
                <div class="col text-right">
                    <a href="tambah-inventaris" class="btn btn-warning">Input Penggunaan</a>
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
                        <th>Meter Awal</th>
                        <th>Meter Akhir</th>
                        <th>Aksi</th>
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
                        <td>0</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>32153211045</td>
                        <td>Ahmad Kurniawan</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R3/900VA</td>
                        <td>0</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>32153211037</td>
                        <td>Harun</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R2/450VA</td>
                        <td>0</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>32153211032</td>
                        <td>Bagas</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/450VA</td>
                        <td>0</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>32153211054</td>
                        <td>Ferdiansyah</td>
                        <td>Januari</td>
                        <td>2021</td>
                        <td>R1/900VA</td>
                        <td>0</td>
                        <td>100</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection