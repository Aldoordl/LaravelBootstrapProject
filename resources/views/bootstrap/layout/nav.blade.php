<!-- Navbar untuk Halaman Selain Login dan Register -->
@if (!request()->routeIs(['login', 'register', 'admin.projects.edit', 'admin.projects.create']))
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="{{ route('dashboard') }}"><span class="fw-bolder text-gradient">{{ config('app.name') }}</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    @if(!request()->routeIs('contact.message'))
                    <li class="nav-item"><a class="nav-link {{ request()->is("/") ? 'active' : '' }}" href="{{ route('dashboard') }}">Explore</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is("resume") ? 'active' : '' }}" href="{{ route('resume') }}">Resume</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is("project") ? 'active' : '' }}" href="{{ route('project') }}">Projects</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is("about") ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is("contact") ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                    
                    @auth
                        @if(auth()->user()->role == 'admin')
                            <li class="nav-item">
                                <a class="btn btn-outline-dark btn-sm px-3 py-2 ms-2 fs-7 fw-bolder" href="{{ route('admin.dashboard') }}">Admin</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn btn-outline-dark btn-sm px-3 py-2 ms-2 fs-7 fw-bolder" type="submit">Sign out</button>
                                </form>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-dark btn-sm px-3 py-2 ms-2 fs-7 fw-bolder" href="{{ route('login') }}">Sign in</a>
                        </li>
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif

<!-- Navbar untuk Halaman Login dan Register -->
@if (request()->routeIs(['login', 'register']))
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="{{ route('dashboard') }}"><span class="fw-bolder text-gradient">{{ config('app.name') }}</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a class="nav-link {{ request()->is("login") ? 'active' : '' }}" href="{{ route('login') }}">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is("register") ? 'active' : '' }}" href="{{ route('register') }}">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
@endif

<!-- Navbar khusus untuk Halaman Edit dan Create Project -->
@if (request()->routeIs(['admin.projects.edit', 'admin.projects.create']))
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="{{ route('admin.projects.index') }}"><span class="fw-bolder text-gradient">{{ config('app.name') }}</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a class="nav-link {{ request()->is("project") ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">Back</a></li>
                    {{-- <li class="nav-item">
                        <a class="btn btn-outline-dark btn-sm px-3 py-2 ms-2 fs-7 fw-bolder" href="{{ route('admin.projects.index') }}">Back</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
@endif