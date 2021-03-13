@extends('admin.layouts.app')

@section('title','Edit Tarif | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Edit Tarif</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Edit Data Tarif</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tarif.update',$tarif->id) }}" method="POST">
                @csrf
                @error('kode_tarif')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Golongan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" value=" {{ old('golongan', $tarif->golongan) }} ">

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
                        <select class="custom-select mr-sm-2" name="daya">
                            <option value="450VA" {{$tarif->daya == '450VA' ? 'selected' : ''}}>450VA</option>
                            <option value="900VA" {{$tarif->daya == '900VA' ? 'selected' : ''}}>900VA</option>
                            <option value="1300VA" {{$tarif->daya == '1300VA' ? 'selected' : ''}}>1300VA</option>
                            <option value="2200VA" {{$tarif->daya == '2200VA' ? 'selected' : ''}}>2200VA</option>
                            <option value="3300VA" {{$tarif->daya == '3300VA' ? 'selected' : ''}}>3300VA</option>
                            <option value="5500VA" {{$tarif->daya == '5500VA' ? 'selected' : ''}}>5500VA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tarif/kWh</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                            <div class="col">
                                <input type="number" class="form-control  @error('tarif_perkwh') is-invalid @enderror" value="{{ old('tarif_perkwh', $tarif->tarif_perkwh) }}" name="tarif_perkwh">

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
                        <button type="submit" class="btn btn-success">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection