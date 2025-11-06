    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary">Cuki Cukrászda</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : ''}}">Főoldal</a>
                <a href="{{ route('database') }}" class="nav-item nav-link {{ request()->routeIs('database') ? 'active' : ''}}">Adatbázis</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : ''}}">Kapcsolat</a>
                @if (Auth::check())
                <a href="{{ route('messages') }}" class="nav-item nav-link {{ request()->routeIs('messages') ? 'active' : ''}}">Üzenetek</a>
                @endif
                <a href="{{ route('diagram') }}" class="nav-item nav-link {{ request()->routeIs('diagram') ? 'active' : ''}}">Diagram</a>
                <a href="{{ route('crud') }}" class="nav-item nav-link {{ request()->routeIs('crud') ? 'active' : ''}}">CRUD</a>


                @if (Auth::check())
                    <!-- Admin jog ellenőrzése -->
                    @if (Auth::User()->role==1) 
                    <a href="{{ route('admin') }}" class="nav-item nav-link {{ request()->routeIs('admin') ? 'active' : ''}}">Admin</a>
                    @endif

                    <a href="{{ route('logout') }}" class="nav-item nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Kilépés
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                <a href="{{ route('login') }}" class="nav-item nav-link">Belépés</a>
                @endif
            </div>

            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i
                        class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->