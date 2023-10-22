<!-- Sidebar -->
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar shadow rounded">
    <div class="position-sticky">
        <ul class="navbar-nav flex-column py-3">
            <li class="nav-item mb-3">
                <a class="nav-link {{ request()->is("/admin") ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link" href="{{ route('admin.profile') }}">
                    Profile
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link" href="{{ route('admin.resume') }}">
                    Resume
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link" href="{{ route('admin.projects.index') }}">
                    Project
                </a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link" href="{{ route('admin.reports') }}">
                    Report
                </a>
            </li>
            <li class="nav-item mb-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-dark btn-sm px-3 py-2 fs-7 fw-bolder" type="submit">Sign out</button>
                </form> 
            </li>
        </ul>
    </div>
</nav>