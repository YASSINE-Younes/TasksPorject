@extends('theme.master')

@section('content')
    <style>
        .task-card {
            overflow: hidden;
            border: 1px solid #e9ecef;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .task-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .task-card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .task-description {
            min-height: 48px;
        }

        .task-search-icon {
            width: 46px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    {{-- Start Page Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fs-3 mb-1">Mes tâches</h1>

            <p class="text-secondary mb-0">
                Consultez et gérez toutes vos tâches.
            </p>
        </div>

        <a href="{{ route('theme.add') }}" class="btn btn-primary">
            <i class="ti ti-plus me-1"></i>
            Ajouter une tâche
        </a>

    </div>
    {{-- End Page Header --}}

    {{-- Start Search And Filters --}}
    <div class="card mb-4">

        <div class="card-body p-3">

            <div class="row g-3">

                {{-- Search --}}
                <div class="col-lg-6 col-12">

                    <div class="input-group">

                        <span class="input-group-text bg-white task-search-icon">
                            <i class="ti ti-search"></i>
                        </span>

                        <input type="text" class="form-control" placeholder="Rechercher une tâche...">

                    </div>

                </div>

                {{-- Status Filter --}}
                <div class="col-lg-3 col-md-6 col-12">

                    <select class="form-select">
                        <option value="">Tous les statuts</option>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>

                </div>

                {{-- Priority Filter --}}
                <div class="col-lg-3 col-md-6 col-12">

                    <select class="form-select">
                        <option value="">Toutes les priorités</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>

                </div>

            </div>

        </div>

    </div>
    {{-- End Search And Filters --}}

    {{-- Start Tasks Cards --}}
    <div class="row g-4">

        {{-- Task 1 --}}

        @if (count($tasks) > 0)
            @foreach ($tasks as $task)
                <div class="col-xl-4 col-md-6 col-12">

                    <article class="card task-card h-100">

                        <!-- Start Image -->
                        @if ($task->image)
                            <img src="{{ asset("storage/tasks/$task->image") }}" class="task-card-image"
                                alt="{{ $task->title }}">
                        @else
                            <div class="task-card-image d-flex justify-content-center align-items-center bg-light">
                                <i class="ti ti-photo-off fs-1 text-secondary"></i>
                            </div>
                        @endif
                        <!-- End Image -->
                        <div class="card-body p-4">

                            {{-- Status And Priority --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="badge bg-warning-subtle text-warning">
                                    <i class="ti ti-clock me-1"></i>
                                    {{ $task->status }}
                                </span>

                                <span class="badge bg-danger-subtle text-danger">
                                    <i class="ti ti-flag me-1"></i>
                                    {{ $task->priority }}
                                </span>

                            </div>

                            {{-- Title --}}
                            <h2 class="h5 mb-2">
                                {{ $task->title }}
                            </h2>

                            {{-- Description --}}
                            <p class="task-description text-secondary mb-3">

                                {{ Str::limit($task->description, 100, '...') }}
                            </p>

                            {{-- Due Date --}}
                            <div class="d-flex align-items-center gap-2 border-top border-bottom py-3 mb-4">

                                <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle">
                                    <i class="ti ti-calendar-due"></i>
                                </div>

                                <div>
                                    <small class="d-block text-secondary">
                                        Date d’échéance
                                    </small>

                                    <span class="fw-semibold">
                                        {{ date('d-M-Y', strtotime($task->due_date)) }}
                                    </span>
                                </div>

                            </div>

                            {{-- Actions --}}
                            <div class="d-flex gap-2">

                                <a href="#" class="btn btn-primary btn-sm flex-grow-1">
                                    <i class="ti ti-eye me-1"></i>
                                    Voir
                                </a>

                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Modifier">
                                    <i class="ti ti-pencil"></i>
                                </a>

                                <button type="button" class="btn btn-outline-danger btn-sm" title="Supprimer">
                                    <i class="ti ti-trash"></i>
                                </button>

                            </div>

                        </div>

                    </article>

                </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Vous n’avez encore aucune tâche.
                </div>
            </div>
        @endif


    </div>
    {{-- End Tasks Cards --}}

    {{-- Start Pagination --}}
    <div class="d-flex justify-content-center mt-5">



        {{ $tasks->render('pagination::bootstrap-4') }}



    </div>
    {{-- End Pagination --}}

    @include('theme.partials.footer')
@endsection
