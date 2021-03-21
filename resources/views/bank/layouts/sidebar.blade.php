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
                <a href="{{ route('dashboard') }}" class="nav-link text-white rounded {{Route::is('dashboard') || Route::is('profile') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-tachometer-alt mr-3 text-white fa-fw"></i>Dashboard
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('pembayaran') }}" class="nav-link text-white rounded {{Route::is('pembayaran') || Route::is('pembayaran.detail') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fa fa-wallet mr-3 text-white fa-fw"></i>Pembayaran
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{ route('riwayat') }}" class="nav-link text-white rounded {{Route::is('riwayat') || Route::is('riwayat.detail') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-history mr-3 text-white fa-fw"></i>Riwayat Pembayaran
                </a>
            </div>
        </li>
        <li class="nav-item">
            <div class="px-2 pb-1">
                <a href="{{route('laporan.pembayaran')}}" class="nav-link text-white rounded {{Route::is('laporan.pembayaran') || Route::is('laporan.pembayaran.cek') ? 'font-weight-bold btn-primary' : ''}}">
                    <i class="fas fa-money-check-alt mr-3 text-white fa-fw"></i>Laporan Pembayaran
                </a>
            </div>
        </li>
    </ul>
</div>