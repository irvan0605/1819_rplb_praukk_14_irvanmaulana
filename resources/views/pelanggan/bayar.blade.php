<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTagihan">
    Bayar
</button>

<div class="modal fade" id="modalTagihan" tabindex="-1" role="dialog" aria-labelledby="modalTagihanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bayar Tagihan</h5>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">ID Pelanggan</label>
                    <div class="col-md-6 col-lg-7">
                        <input type="number" class="form-control" value="{{ $data->pelanggan->nomor_meter }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">Bulan Penggunaan</label>
                    <div class="col-md-6 col-lg-7">
                        <input type="text" class="form-control" name="bulan_bayar" value="{{ $data->bulan }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">Tahun Penggunaan</label>
                    <div class="col-md-6 col-lg-7">
                        <input type="number" class="form-control" name="tahun_bayar" value="{{ $data->tahun }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">Jumlah Meter</label>
                    <div class="col-md-6 col-lg-7">
                        <input type="number" class="form-control" name="jumlah_meter" value="{{ $data->jumlah_meter }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">Jumlah Bayar</label>
                    <div class="col-md-6 col-lg-7">
                        <div class="row">
                            <div class="col-2 col-md-3 col-lg-3"><small>Rp. </small></div>
                            <div class="col">
                                <input type="number" class="form-control" name="jumlah_bayar" value="{{ $data->jumlah_bayar }}" id="jumlah_bayar" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-6 col-lg-5 col-form-label text-left">Biaya Admin</label>
                    <div class="col-md-6 col-lg-7">
                        <div class="row">
                            <div class="col-2 col-md-3 col-lg-3"><small>Rp. </small></div>
                            <div class="col">
                                <input type="number" class="form-control" name="biaya_admin" value="2000" readonly id="biaya_admin">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>
                    <span>Total Bayar : </span>
                    <span class="ml-5">Rp. {{ number_format($data->jumlah_bayar + 2000,2,',',',') }} ,-</span>
                </h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="lanjut">
                    Lanjut
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="modalBayarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pilih Metode Pembayaran</h5>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action" id="bca">
                        <div class="row">
                            <div class="col-2 mr-sm-4">
                                <img src="/assets/img/bankbca.png" alt="" width="75px" class="pt-2">
                            </div>
                            <div class="col text-left">
                                <h6 class="pb-1">BCA</h6>
                                <span>Bayar di ATM BCA atau internet banking</span>
                            </div>
                        </div>
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" id="mandiri">
                        <div class="row">
                            <div class="col-2 mr-sm-4">
                                <img src="/assets/img/bankmandiri.png" alt="" width="75px" class="pt-2">
                            </div>
                            <div class="col text-left">
                                <h6 class="pb-1">MANDIRI</h6>
                                <span>Bayar di ATM MANDIRI atau internet banking</span>
                            </div>
                        </div>
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" id="bri">
                        <div class="row">
                            <div class="col-2 mr-sm-4">
                                <img src="/assets/img/bankbri.png" alt="" width="75px" class="pt-2">
                            </div>
                            <div class="col text-left">
                                <h6 class="pb-1">BRI</h6>
                                <span>Bayar di ATM BRI atau internet banking</span>
                            </div>
                        </div>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBca" tabindex="-1" role="dialog" aria-labelledby="modalBayarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/img/bankbca.png" alt="" width="75px">
                <h5 class="modal-title" id="exampleModalLongTitle">BANK BCA</h5>
            </div>
            <div class="modal-body" style="background-color: #f4f6f9;">
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col-3 text-left">
                            <h5>Total</h5>
                        </div>
                        <div class="col-9 text-right">
                            <h3>
                                <p style="font-size:20px" class="d-inline">Rp.</p> {{ number_format($data->jumlah_bayar + 2000,2,',',',') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <hr style="background-color: #000; height:1px;">

                <h6 class="pb-1 text-left">Harap segera selesaikan pembayaran anda</h6>
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col text-left">
                            <h4>Nomor Rekening</h4>
                            <h2>3267980092</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="kembali()">
                    Kembali
                </button>
                <form action="{{ route('bayar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tagihan" value="{{ $data->id }}">
                    <input type="hidden" name="pelanggan" value="{{ $data->pelanggan_id }}">
                    <input type="hidden" name="bulan" value="{{ $data->bulan }}">
                    <input type="hidden" name="tahun" value="{{ $data->tahun }}">
                    <input type="hidden" name="biaya_admin" value="2000">
                    <input type="hidden" name="total_bayar" value="{{ $data->jumlah_bayar + 2000 }}">
                    <input type="hidden" name="metode" value="1">
                    <button type="submit" class="btn btn-dark">
                        Selesaikan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBri" tabindex="-1" role="dialog" aria-labelledby="modalBayarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/img/bankbri.png" alt="" width="100px">
                <h5 class="modal-title" id="exampleModalLongTitle">BANK BRI</h5>
            </div>
            <div class="modal-body" style="background-color: #f4f6f9;">
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col-3 text-left">
                            <h5>Total</h5>
                        </div>
                        <div class="col-9 text-right">
                            <h3>
                                <p style="font-size:20px" class="d-inline">Rp.</p> {{ number_format($data->jumlah_bayar + 2000,2,',',',') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <hr style="background-color: #000; height:1px;">

                <h6 class="pb-1 text-left">Harap segera selesaikan pembayaran anda</h6>
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col text-left">
                            <h4>Nomor Rekening</h4>
                            <h2>176879998280072</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="kembali()">
                    Kembali
                </button>
                <form action="{{ route('bayar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tagihan" value="{{ $data->id }}">
                    <input type="hidden" name="pelanggan" value="{{ $data->pelanggan_id }}">
                    <input type="hidden" name="bulan" value="{{ $data->bulan }}">
                    <input type="hidden" name="tahun" value="{{ $data->tahun }}">
                    <input type="hidden" name="biaya_admin" value="2000">
                    <input type="hidden" name="total_bayar" value="{{ $data->jumlah_bayar + 2000 }}">
                    <input type="hidden" name="metode" value="2">
                    <button type="submit" class="btn btn-dark">
                        Selesaikan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMandiri" tabindex="-1" role="dialog" aria-labelledby="modalBayarTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/img/bankmandiri.png" alt="" width="90px">
                <h5 class="modal-title" id="exampleModalLongTitle">BANK MANDIRI</h5>
            </div>
            <div class="modal-body" style="background-color: #f4f6f9;">
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col-3 text-left">
                            <h5>Total</h5>
                        </div>
                        <div class="col-9 text-right">
                            <h3>
                                <p style="font-size:20px" class="d-inline">Rp.</p> {{ number_format($data->jumlah_bayar + 2000,2,',',',') }}
                            </h3>
                        </div>
                    </div>
                </div>
                <hr style="background-color: #000; height:1px;">

                <h6 class="pb-1 text-left">Harap segera selesaikan pembayaran anda</h6>
                <div class="container">
                    <div class="row bg-white py-2">
                        <div class="col text-left">
                            <h4>Nomor Rekening</h4>
                            <h2>58977723873900</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="kembali()">
                    Kembali
                </button>
                <form action="{{ route('bayar') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tagihan" value="{{ $data->id }}">
                    <input type="hidden" name="pelanggan" value="{{ $data->pelanggan_id }}">
                    <input type="hidden" name="bulan" value="{{ $data->bulan }}">
                    <input type="hidden" name="tahun" value="{{ $data->tahun }}">
                    <input type="hidden" name="biaya_admin" value="2000">
                    <input type="hidden" name="total_bayar" value="{{ $data->jumlah_bayar + 2000 }}">
                    <input type="hidden" name="metode" value="3">
                    <button type="submit" class="btn btn-dark">
                        Selesaikan Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>