@extends('admin.layouts.app')

@section('title','Edit Penggunaan | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Edit Penggunaan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Edit Data Penggunaan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('penggunaan.update',$data->penggunaan->id) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2" name="pelanggan_id">
                            <option value="{{$data->pelanggan->id}}">{{$data->pelanggan->nomor_meter}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ucfirst($data->pelanggan->nama_pelanggan)}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Bulan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="bulan" value="{{ucfirst($data->penggunaan->bulan)}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tahun</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tahun" value="{{$data->penggunaan->tahun}}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Awal</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="meter_awal" value="{{ old('meter_awal', $data->penggunaan->meter_awal) }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Akhir</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('meter_akhir') is-invalid @enderror" name="meter_akhir" value="{{ old('meter_akhir',$data->penggunaan->meter_akhir) }}">
                        @error('meter_akhir')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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