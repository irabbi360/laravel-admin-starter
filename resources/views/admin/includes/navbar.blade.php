<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('admin.index') }}">{{ config('devstarit.app_name') }}</a>
    <button class="navbar-toggler d-md-none collapsed me-4" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="dropdown me-3">
        <a href="javascript:void(0)" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-lg-start border-0 shadow-sm rounded-0">
            <li><a class="dropdown-item" href="{{ route('admin.profile.index') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.password.index') }}">Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</header>
