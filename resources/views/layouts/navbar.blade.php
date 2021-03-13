<!-- NAVBAR HOMEPAGE -->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #3C256C;">
    <div class="container">
        <a class="navbar-brand justify-content-center" href="#">
            <img src="/assets/img/logo.png" alt="" width="50">
            <span class="font-weight-bold" style="margin-top: 10px;">Electric Payment</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-3">
                    <a class="nav-link {{Route::is('home') ? 'active' : ''}}" href="/">Home</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{Route::is('about') ? 'active' : ''}}" href="#">About</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link {{Route::is('login') ? 'active' : ''}}" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary rounded-pill px-4 text-white" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>