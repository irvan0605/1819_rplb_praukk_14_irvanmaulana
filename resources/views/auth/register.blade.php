<!-- Ekstend ke layouts/app -->
@extends('layouts.app')

<!-- Judul Halaman -->
@section('title', 'Register | Electric Payment')

<!-- Isi Halaman Register -->
@section('content')

<div class="bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 my-5 pt-3 pb-3 bg-white">
                <div class="container">
                    <h3 class="text-center" style="color: #3C256C;">Register</h3>
                    <hr style="color: #3C256C;">

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class=" row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama_user">Name</label>
                                    <input type="text" class="form-control mt-2 @error('nama_user') is-invalid @enderror" name="nama_user" id="nama_user" value="{{ old('nama_user') }}">

                                    @error('nama_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" class="form-control mt-2 @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" id="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control mt-2" name="password_confirmation" id="password">
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="nomor_telepon">Telephone</label>
                                    <input type="number" class="form-control mt-2 @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" id="nomor_telepon">

                                    @error('nomor_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-8 mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-none">Already have an account?</a>
                            </div>
                            <div class="col-4 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Isi Halaman -->

@endsection