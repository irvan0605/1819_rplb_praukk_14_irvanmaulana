@extends('bank.layouts.app')

@section('title','Edit Profile | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Edit Profile</h3>

    <div class="card">

        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Nama</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('nama_user') is-invalid @enderror" name="nama_user" value="{{ old('nama_user', Auth::user()->nama_user ) }}">

                        @error('nama_user')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Username</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', Auth::user()->username) }}">

                        @error('username')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Telepon</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon', Auth::user()->nomor_telepon) }}">

                        @error('nomor_telepon')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="foto" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Foto</label>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <img src="{{ asset('storage/'.Auth::user()->foto.'' ) }}" class="img-thumbnail img-preview rounded-circle">
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImg()">

                            @error('foto')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label class="custom-file-label" for="foto">Pilih Gambar..</label>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection