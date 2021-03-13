@extends('pelanggan.layouts.app')

@section('title','Konfirmasi Pembayaran | Electric Payment')

@section('content')

<div class="container-fluid mb-5">
    <h3 class=" py-3">Konfirmasi Pembayaran</h3>

    <div class="card mb-2">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Konfirmasi Data Pembayaran</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('konfirmasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $data->id }}" name="id">
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" value="{{ $data->pelanggan->nomor_meter }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Nama Pelanggan</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{ ucfirst($data->pelanggan->nama_pelanggan) }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Total Bayar</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-2 col-md-3 col-lg-2"><small>Rp. </small></div>
                            <div class="col">
                                <input type="number" class="form-control" name="total_bayar" value="{{ $data->total_bayar }}" readonly>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Metode Pembayaran</label>
                    <div class="col-md-6">
                        @if ($data->metode_id == 1 )
                        <img src="/assets/img/bankbca.png" alt="" width="75px">
                        @elseif ($data->metode_id == 2 )
                        <img src="/assets/img/bankbri.png" alt="" width="100px">
                        @else
                        <img src="/assets/img/bankmandiri.png" alt="" width="100px">
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bukti_gambar" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <img src="#" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  @error('bukti_bayar') is-invalid @enderror" id="bukti_bayar" name="bukti_bayar" onchange="previewImg()">

                            @error('bukti_bayar')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label class="custom-file-label" for="bukti_bayar">Pilih Gambar..</label>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-11 col-lg-9 text-right">
                        <a href="{{ route('transaksi') }}" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </div>
            </form>


        </div>
    </div>


</div>

@endsection