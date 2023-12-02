<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top top-0">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">HOLADOC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kategori') ? 'active' : '' }}"
                        href="{{ route('kategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('keranjang') ? 'active' : '' }}"
                        href="{{ route('keranjang') }}">Keranjang</a>
                </li>
                @guest
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item dropdown d-lg-none d-block">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
        @guest
            <div class="gap-2 d-lg-flex d-none">
                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-pill">Register</a>
            </div>
        @else
            <li class="nav-item dropdown d-lg-block d-none">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
        @endguest
    </div>
</nav>
