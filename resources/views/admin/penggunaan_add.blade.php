@extends('admin.layouts.app')

@section('title','Input Penggunaan | Electric Payment')

@section('content')

<div class="container-fluid mb-5 mb-md-0">
    <h3 class=" py-3">Input Penggunaan</h3>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col">
                    <span style="font-size: 18px;">Input Data Penggunaan</span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('penggunaan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $penggunaan }}">
                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">ID Pelanggan</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2 @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" id="pelanggan_id">
                            <option value="">Pilih ID Pelanggan</option>
                            @foreach($pelanggan as $data)
                            <option value="{{$data->id}}">{{ $data->nomor_meter.' - '.ucfirst($data->nama_pelanggan)}}</option>
                            @endforeach
                        </select>

                        @error('pelanggan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Bulan</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2 @error('bulan') is-invalid @enderror" name="bulan">
                            <option value="">Pilih Bulan..</option>
                            <option value="januari" {{old('bulan') == 'januari' ? 'selected' : ''}}>Januari</option>
                            <option value="februari" {{old('bulan') == 'februari' ? 'selected' : ''}}>Februari</option>
                            <option value="maret" {{old('bulan') == 'maret' ? 'selected' : ''}}>Maret</option>
                            <option value="april" {{old('bulan') == 'april' ? 'selected' : ''}}>April</option>
                            <option value="mei" {{old('bulan') == 'mei' ? 'selected' : ''}}>Mei</option>
                            <option value="juni" {{old('bulan') == 'juni' ? 'selected' : ''}}>Juni</option>
                            <option value="juli" {{old('bulan') == 'juli' ? 'selected' : ''}}>Juli</option>
                            <option value="agustus" {{old('bulan') == 'agustus' ? 'selected' : ''}}>Agustus</option>
                            <option value="september" {{old('bulan') == 'september' ? 'selected' : ''}}>September</option>
                            <option value="oktober" {{old('bulan') == 'oktober' ? 'selected' : ''}}>Oktober</option>
                            <option value="november" {{old('bulan') == 'november' ? 'selected' : ''}}>November</option>
                            <option value="desember" {{old('bulan') == 'desember' ? 'selected' : ''}}>Desember</option>
                        </select>

                        @error('bulan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Tahun</label>
                    <div class="col-md-6">
                        <select class="custom-select mr-sm-2 @error('tahun') is-invalid @enderror" name="tahun">
                            <option value="">Pilih tahun..</option>
                            <option value="2021" {{old('tahun') == '2021' ? 'selected' : ''}}>2021</option>
                            <option value="2022" {{old('tahun') == '2022' ? 'selected' : ''}}>2022</option>
                            <option value="2023" {{old('tahun') == '2023' ? 'selected' : ''}}>2023</option>
                        </select>

                        @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Awal</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control" name="meter_awal" id="meter_awal" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-md-5 col-lg-3 col-form-label">Meter Akhir</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control @error('meter_akhir') is-invalid @enderror" name="meter_akhir" value="{{ old('meter_akhir') }}">
                        @error('meter_akhir')
                        <span class=" invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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