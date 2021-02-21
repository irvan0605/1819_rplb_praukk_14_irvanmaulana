@extends('admin.layouts.app')

@section('title','Kelola Pelanggan | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Kelola Pelanggan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Pelanggan</span>
                </div>
                <div class="col text-right">
                    <a href="tambah-inventaris" class="btn btn-warning">Tambah Pelanggan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="datatables" width="100%">
                <thead>
                    <tr>
                        <th id="klik">No.</th>
                        <th>ID Pelanggan</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Tarif/Daya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>32153211010</td>
                        <td>Sigit Nugroho</td>
                        <td>Jl. Durian No.8 Bekasi</td>
                        <td>R3/450VA</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>32153211045</td>
                        <td>Ahmad Kurniawan</td>
                        <td>Jl. Mangga No.8 Bekasi</td>
                        <td>R3/450VA</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>32153211037</td>
                        <td>Harun</td>
                        <td>Jl. Anggur No.8 Bekasi</td>
                        <td>R3/450VA</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>32153211032</td>
                        <td>Bagas</td>
                        <td>Jl. Jeruk No.8 Bekasi</td>
                        <td>R3/450VA</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>32153211054</td>
                        <td>Ferdiansyah</td>
                        <td>Jl. Kamboja No.8 Bekasi</td>
                        <td>R3/450VA</td>
                        <td><a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div>
    </div>


</div>

@endsection