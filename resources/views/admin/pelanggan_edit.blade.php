@extends('admin.layouts.app')

@section('title','Edit Pelanggan | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Tambah Pelanggan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Edit Data Pelanggan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="nomor_meter" value="{{ $pelanggan->nomor_meter }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}">

                        @error('nama_pelanggan')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Alamat Pelanggan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat',$pelanggan->alamat) }}">
                        @error('alamat')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tarif/Daya</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2" name="tarif_id">
                            @foreach($tarif as $t)
                            <option value="{{$t->id}}" @if (old('tarif_id', $pelanggan->tarif_id) == $t->id) selected="selected" @endif>{{$t->kode_tarif}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                        <button type="submit" class="btn btn-success">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection