<!-- Ekstend ke layouts/app -->
@extends('homepage.layouts.app')

<!-- Judul Halaman -->
@section('title', 'Login | Electric Payment')

<!-- Isi Halaman Login -->
@section('content')

<div class="bg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 my-5 pt-3 pb-3 bg-white">
                <div class="container">
                    <h3 class="text-center" style="color: #3C256C;">Login</h3>
                    <hr style="color: #3C256C;">
                    <form action="/login" method="POST" class="">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control mt-2" name="username" id="username">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mt-2" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-8 mt-3">
                                <a href="/register" class="text-decoration-none">Don't have an account?</a>
                            </div>
                            <div class="col-4 mt-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
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