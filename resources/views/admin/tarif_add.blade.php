@extends('admin.layouts.app')

@section('title','Tambah Tarif | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Tambah Tarif</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Tambah Data Tarif</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tarif.store') }}" method="POST">
                @csrf
                @error('kode_tarif')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Golongan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" value="{{ old('golongan') }}">

                        @error('golongan')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Daya</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2 @error('daya') is-invalid @enderror" name="daya">
                            <option value="">Pilih Daya..</option>
                            <option value="450VA" {{old('daya') == '450VA' ? 'selected' : ''}}>450VA</option>
                            <option value="900VA" {{old('daya') == '900VA' ? 'selected' : ''}}>900VA</option>
                            <option value="1300VA" {{old('daya') == '1300VA' ? 'selected' : ''}}>1300VA</option>
                            <option value="2200VA" {{old('daya') == '2200A' ? 'selected' : ''}}>2200A</option>
                            <option value="3300VA" {{old('daya') == '3300VA' ? 'selected' : ''}}>3300VA</option>
                            <option value="5500VA" {{old('daya') == '5500VA' ? 'selected' : ''}}>5500VA</option>
                        </select>

                        @error('daya')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tarif/kWh</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                            <div class="col">
                                <input type="number" class="form-control @error('tarif_perkwh') is-invalid @enderror" name="tarif_perkwh" value="{{ old('tarif_perkwh') }}">

                                @error('tarif_perkwh')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection