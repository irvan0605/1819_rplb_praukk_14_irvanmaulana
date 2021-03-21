<nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm" style="width:100%" id="navbar">

    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded shadow-sm">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item mt-1">
            <img src="{{ asset('storage/'.Auth::user()->foto.'') }}" alt="" width="30" class="img-thumbnail rounded-circle p-0 shadow-sm">
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ ucfirst(Auth::user()->nama_user) }}
            </a>
            <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown" style="min-width: 0; max-width:5rem">
                <a class="dropdown-item px-3 py-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>