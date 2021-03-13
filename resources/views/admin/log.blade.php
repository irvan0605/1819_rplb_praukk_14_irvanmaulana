@extends('admin.layouts.app')

@section('title','Activity Log | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Activity Log</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Data Activity Log</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped" id="datatables" width="100%">
                <thead>
                    <tr>
                        <th id="klik">No.</th>
                        <th>Nama Log</th>
                        <th>Tabel</th>
                        <th>Id Ref</th>
                        <th>Deskripsi</th>
                        <th>Role</th>
                        <th>Nama User</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($log as $data)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $data->nama_log }}</td>
                        <td>{{ $data->tabel }}</td>
                        <td>{{ $data->id_referensi }}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ ucfirst($data->nama_level) }}</td>
                        <td>{{ ucfirst($data->nama_user) }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <a href="{{ route('log.delete', $data->id) }}" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div>
    </div>


</div>

@endsection