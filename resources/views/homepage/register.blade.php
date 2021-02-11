<!-- Ekstend ke layouts/app -->
@extends('homepage.layouts.app')

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

                    <form action="" method="POST" class="">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="username">Name</label>
                                    <input type="text" class="form-control mt-2" name="username" id="username">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Username</label>
                                    <input type="password" class="form-control mt-2" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control mt-2" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control mt-2" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="password">Telephone</label>
                                    <input type="password" class="form-control mt-2" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-8 mt-3">
                                <a href="/login" class="text-decoration-none">Already have an account?</a>
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

@endsection