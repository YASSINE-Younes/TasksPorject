@extends('theme.master')

@section('content')
    <style>
        .dashboard-stat-card {
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .dashboard-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        }

        .deadline-item {
            padding: 16px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .deadline-item:last-child {
            border-bottom: 0;
        }
    </style>

    {{-- Start Page Header --}}
    <div class="d-flex flex-column flex-md-row
                justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fs-3 mb-1">
                Tableau de bord
            </h1>

            <p class="text-secondary mb-0">
                Bonjour {{ Auth::user()->name }}, voici un aperçu de vos tâches.
            </p>
        </div>

        <a href="{{ route('theme.add') }}" class="btn btn-primary">

            <i class="ti ti-plus me-1"></i>
            Ajouter une tâche
        </a>

    </div>
    {{-- End Page Header --}}

    {{-- Start Statistics --}}
    <div class="row g-3 mb-4">

        {{-- Total Tasks --}}
        <div class="col-xl-3 col-md-6 col-12">

            <div
                class="card dashboard-stat-card p-4
                        bg-primary bg-opacity-10
                        border border-primary border-opacity-25">

                <div class="d-flex align-items-center gap-3">

                    <div class="icon-shape icon-md bg-primary text-white rounded-2">
                        <i class="ti ti-list-check fs-4"></i>
                    </div>

                    <div>
                        <p class="text-secondary small mb-1">
                            Total des tâches
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $totalTasks }}
                        </h2>

                        <span class="text-primary small">
                            Toutes vos tâches
                        </span>
                    </div>

                </div>

            </div>

        </div>

        {{-- Pending Tasks --}}
        <div class="col-xl-3 col-md-6 col-12">

            <div
                class="card dashboard-stat-card p-4
                        bg-warning bg-opacity-10
                        border border-warning border-opacity-25">

                <div class="d-flex align-items-center gap-3">

                    <div class="icon-shape icon-md bg-warning text-white rounded-2">
                        <i class="ti ti-clock fs-4"></i>
                    </div>

                    <div>
                        <p class="text-secondary small mb-1">
                            En attente
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $pendingTasks }}
                        </h2>

                        <span class="text-warning small">
                            Tâches à commencer
                        </span>
                    </div>

                </div>

            </div>

        </div>

        {{-- In Progress Tasks --}}
        <div class="col-xl-3 col-md-6 col-12">

            <div
                class="card dashboard-stat-card p-4
                        bg-info bg-opacity-10
                        border border-info border-opacity-25">

                <div class="d-flex align-items-center gap-3">

                    <div class="icon-shape icon-md bg-info text-white rounded-2">
                        <i class="ti ti-progress fs-4"></i>
                    </div>

                    <div>
                        <p class="text-secondary small mb-1">
                            En cours
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $inProgressTasks }}
                        </h2>

                        <span class="text-info small">
                            Tâches en progression
                        </span>
                    </div>

                </div>

            </div>

        </div>

        {{-- Completed Tasks --}}
        <div class="col-xl-3 col-md-6 col-12">

            <div
                class="card dashboard-stat-card p-4
                        bg-success bg-opacity-10
                        border border-success border-opacity-25">

                <div class="d-flex align-items-center gap-3">

                    <div class="icon-shape icon-md bg-success text-white rounded-2">
                        <i class="ti ti-circle-check fs-4"></i>
                    </div>

                    <div>
                        <p class="text-secondary small mb-1">
                            Terminées
                        </p>

                        <h2 class="fw-bold mb-1">
                            {{ $completedTasks }}
                        </h2>

                        <span class="text-success small">
                            Tâches accomplies
                        </span>
                    </div>

                </div>

            </div>

        </div>

    </div>
    {{-- End Statistics --}}

    <div class="row g-4 mb-4">

        {{-- Start Status Overview --}}
        <div class="col-xl-8 col-lg-10 col-12 mx-auto">

            <div class="card h-100">

                <div class="card-header bg-transparent p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h2 class="h5 mb-1">
                                Répartition des tâches
                            </h2>

                            <p class="text-secondary small mb-0">
                                Vue globale selon leur statut.
                            </p>
                        </div>

                        <div
                            class="icon-shape icon-sm
                                    bg-primary bg-opacity-10
                                    text-primary rounded-circle">

                            <i class="ti ti-chart-donut"></i>
                        </div>

                    </div>

                </div>

                <div class="card-body p-4">

                    <div class="row align-items-center">

                        {{-- Existing Chart --}}
                        <div class="col-md-7">

                            <div id="taskStatusChart" 
                                        data-pending="{{ $pendingTasks }}"
                                        data-in-progress="{{ $inProgressTasks }}"
                                        data-completed="{{ $completedTasks }}">
                            </div>
                            {{-- <div id="customerChart"></div> --}}

                        </div>

                        {{-- Chart Information --}}
                        <div class="col-md-5">

                            <div
                                class="d-flex align-items-center
                                        justify-content-between mb-3">

                                <span>
                                    <i class="ti ti-circle-filled text-warning me-2"></i>
                                    En attente
                                </span>

                                <strong>{{ $pendingTasks }}</strong>

                            </div>

                            <div
                                class="d-flex align-items-center
                                        justify-content-between mb-3">

                                <span>
                                    <i class="ti ti-circle-filled text-info me-2"></i>
                                    En cours
                                </span>

                                <strong>{{ $inProgressTasks }}</strong>

                            </div>

                            <div
                                class="d-flex align-items-center
                                        justify-content-between">

                                <span>
                                    <i class="ti ti-circle-filled text-success me-2"></i>
                                    Terminées
                                </span>

                                <strong>{{ $completedTasks }}</strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        {{-- End Status Overview --}}



    </div>

    @include('theme.partials.footer')
@endsection
