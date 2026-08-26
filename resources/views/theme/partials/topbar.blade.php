<nav id="topbar"
    class="navbar bg-body border-bottom fixed-top topbar px-3">

    {{-- Desktop Sidebar Button --}}
    <button type="button"
        id="toggleBtn"
        class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm"
        title="Afficher ou masquer le menu">

        <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    {{-- Mobile Sidebar Button --}}
    <button type="button"
        id="mobileBtn"
        class="btn btn-light btn-icon btn-sm d-lg-none"
        title="Ouvrir le menu">

        <i class="ti ti-menu-2"></i>
    </button>

    {{-- Right Actions --}}
    <div class="d-flex align-items-center gap-3 ms-auto">

        {{-- Start Theme Dropdown --}}
        <div class="dropdown">

            <button type="button"
                class="btn btn-light btn-icon btn-sm"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                title="Changer le thème"
                aria-label="Changer le thème">

                <i id="currentThemeIcon" class="ti ti-sun"></i>
            </button>

            <div class="dropdown-menu dropdown-menu-end border-0 shadow p-2 mt-2"
                style="min-width: 180px;">

                {{-- Light Theme --}}
                <button type="button"
                    class="dropdown-item rounded d-flex align-items-center gap-2"
                    data-theme-value="light">

                    <i class="ti ti-sun"></i>

                    <span class="flex-grow-1">
                        Clair
                    </span>

                </button>

                {{-- Dark Theme --}}
                <button type="button"
                    class="dropdown-item rounded d-flex align-items-center gap-2"
                    data-theme-value="dark">

                    <i class="ti ti-moon"></i>

                    <span class="flex-grow-1">
                        Sombre
                    </span>

                </button>

                {{-- System Theme --}}
                <button type="button"
                    class="dropdown-item rounded d-flex align-items-center gap-2"
                    data-theme-value="system">

                    <i class="ti ti-device-desktop"></i>

                    <span class="flex-grow-1">
                        Système
                    </span>

                </button>

            </div>

        </div>
        {{-- End Theme Dropdown --}}

        {{-- Start User Dropdown --}}
        <div class="dropdown">

            <button type="button"
                class="btn border-0 p-0 d-flex align-items-center gap-2"
                data-bs-toggle="dropdown"
                aria-expanded="false">

                <div class="d-none d-md-block text-end">

                    <span class="d-block small fw-semibold text-body">
                        {{ Auth::user()->name }}
                    </span>

                    <small class="text-secondary">
                        Mon compte
                    </small>

                </div>

                <img src="{{ asset('assets/images/avatar/avatar-0.png') }}"
                    alt="Photo de {{ Auth::user()->name }}"
                    class="avatar avatar-sm rounded-circle">

                <i class="ti ti-chevron-down text-secondary"></i>

            </button>

            <div class="dropdown-menu dropdown-menu-end border-0 shadow p-0 mt-2"
                style="min-width: 260px;">

                {{-- User Information --}}
                <div class="d-flex gap-3 align-items-center border-bottom px-3 py-3">

                    <img src="{{ asset('assets/images/avatar/avatar-0.png') }}"
                        alt="Photo de {{ Auth::user()->name }}"
                        class="avatar avatar-md rounded-circle">

                    <div class="overflow-hidden">

                        <h4 class="mb-1 small fw-semibold text-body">
                            {{ Auth::user()->name }}
                        </h4>

                        <p class="mb-0 small text-secondary text-truncate">
                            {{ Auth::user()->email }}
                        </p>

                    </div>

                </div>

                {{-- Navigation --}}
                <div class="p-2">

                    <a href="{{ route('tasks.index') }}"
                        class="dropdown-item d-flex align-items-center gap-2 rounded">

                        <i class="ti ti-list-check"></i>
                        <span>Mes tâches</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="dropdown-item d-flex align-items-center gap-2 rounded">

                        <i class="ti ti-user-cog"></i>
                        <span>Mon profil</span>
                    </a>

                </div>

                {{-- Logout --}}
                <div class="border-top p-2">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="dropdown-item d-flex align-items-center gap-2 rounded text-danger">

                            <i class="ti ti-logout"></i>
                            <span>Se déconnecter</span>

                        </button>

                    </form>

                </div>

            </div>

        </div>
        {{-- End User Dropdown --}}

    </div>
    {{-- End Right Actions --}}

</nav>