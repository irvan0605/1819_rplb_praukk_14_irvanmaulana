<div class="vertical-nav" id="sidebar">
    <div class="py-2 px-3">
        <div class="media d-flex align-items-center">
            <img src="/assets/img/logo.png" alt="" width="40" height="30">
            <div class="media-body">
                <h5 class="m-0 text-white">Electric Payment</h5>
            </div>
        </div>
    </div>
    <hr class="bg-white mt-2" width="250">
    <ul class="nav flex-column mb-0" style="background-color: #3c256c;">
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('dashboard') }}" class="nav-link text-white rounded {{Route::is('dashboard') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-tachometer-alt mr-3 text-white fa-fw"></i>Dashboard
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('tarif') }}" class="nav-link text-white rounded {{Route::is('tarif') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-wallet mr-3 text-white fa-fw"></i>Tarif
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('tagihan') }}" class="nav-link text-white rounded {{Route::is('tagihan') || Route::is('bayar') || Route::is('tagihan.cek') || Route::is('tagihan.detail') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fa fa-money-check-alt mr-3 text-white fa-fw"></i>Tagihan
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('transaksi') }}" class="nav-link text-white rounded {{Route::is('transaksi') || Route::is('transaksi.konfirmasi') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-archive mr-3 text-white fa-fw"></i>Transaksi
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('riwayat') }}" class="nav-link text-white rounded {{Route::is('riwayat') || Route::is('riwayat.detail') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-history mr-3 text-white fa-fw"></i>Riwayat Transaksi
                </a>
            </div>
        </li>
    </ul>
</div>