@extends('admin.layouts.app')

@section('title','Kelola Tarif | Electric Payment')

@section('content')

<div class="container-fluid mb-5" style="min-height: 82.5vh;">
    <h3 class=" py-3">Kelola Tarif</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Tarif</span>
                </div>
                <div class="col text-right">
                    <a href="tambah-inventaris" class="btn btn-warning">Tambah Tarif</a>
                </div>
            </div>
        </div>
        <div class=" card-body">
            <table class="table table-bordered table-striped" id="datatables" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Tarif</th>
                        <th>Golongan</th>
                        <th>Daya</th>
                        <th>Tarif/kWh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>R3/450VA</td>
                        <td>R3</td>
                        <td>450VA</td>
                        <td>Rp. 1.000,-</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>R1/900VA</td>
                        <td>R1</td>
                        <td>900VA</td>
                        <td>Rp. 1.500,-</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>R2/450VA</td>
                        <td>R2</td>
                        <td>450VA</td>
                        <td>Rp. 750,-</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>R1/450VA</td>
                        <td>R1</td>
                        <td>450VA</td>
                        <td>Rp. 1.000,-</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>R3/900VA</td>
                        <td>R3</td>
                        <td>900VA</td>
                        <td>Rp. 1.400,-</td>
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