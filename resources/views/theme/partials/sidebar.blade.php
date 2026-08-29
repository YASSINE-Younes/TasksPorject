<aside id="sidebar" class="sidebar">

    {{-- Start Logo --}}
    <div class="logo-area">

        <a href="{{ route('theme.dashboard') }}"
           class="d-inline-flex align-items-center">

            <span class="logo-text ms-2">

                <img
                    src="{{ asset('assets/images/logo.svg') }}"
                    alt="Gestion de tâches"
                >

            </span>

        </a>

    </div>
    {{-- End Logo --}}


    {{-- Start Navigation --}}
    <ul class="nav flex-column">

        <li class="px-4 py-2">
            <small class="nav-text">Principale</small>
        </li>


        {{-- Tableau de bord --}}
        <li>

            <a
                href="{{ route('theme.dashboard') }}"
                @class([
                    'nav-link',
                    'active' => request()->routeIs('theme.dashboard'),
                ])
            >

                <i class="ti ti-home"></i>

                <span class="nav-text">
                    Tableau de bord
                </span>

            </a>

        </li>


        {{-- Mes tâches --}}
        <li>

            <a
                href="{{ route('tasks.index') }}"
                @class([
                    'nav-link',
                    'active' => request()->routeIs(
                        'tasks.index',
                        'tasks.show',
                        'tasks.edit'
                    ),
                ])
            >

                <i class="ti ti-list-check"></i>

                <span class="nav-text">
                    Mes tâches
                </span>

            </a>

        </li>


        {{-- Ajouter une tâche --}}
        <li>

            <a
                href="{{ route('tasks.create') }}"
                @class([
                    'nav-link',
                    'active' => request()->routeIs('tasks.create'),
                ])
            >

                <i class="ti ti-plus"></i>

                <span class="nav-text">
                    Ajouter une tâche
                </span>

            </a>

        </li>

    </ul>
    {{-- End Navigation --}}

</aside>