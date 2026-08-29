@extends('theme.master')

@section('title', 'Détails de la tâche')

@section('content')
    <style>
        .task-details-image {
            width: 100%;
            height: 380px;
            object-fit: cover;
        }

        .task-image-placeholder {
            width: 100%;
            height: 380px;
        }

        .task-info-item {
            padding: 16px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .task-info-item:last-child {
            border-bottom: 0;
        }
    </style>

    {{-- Status variables --}}
    @php
        $statusColor = 'secondary';
        $statusIcon = 'ti-help-circle';
        $statusLabel = $task->status;

        if ($task->status === 'pending') {
            $statusColor = 'warning';
            $statusIcon = 'ti-clock';
            $statusLabel = 'Pending';
        } elseif ($task->status === 'in_progress') {
            $statusColor = 'primary';
            $statusIcon = 'ti-progress';
            $statusLabel = 'In Progress';
        } elseif ($task->status === 'completed') {
            $statusColor = 'success';
            $statusIcon = 'ti-circle-check';
            $statusLabel = 'Completed';
        }
    @endphp

    {{-- Priority variables --}}
    @php
        $priorityColor = 'secondary';
        $priorityLabel = $task->priority;

        if ($task->priority === 'low') {
            $priorityColor = 'success';
            $priorityLabel = 'Low';
        } elseif ($task->priority === 'medium') {
            $priorityColor = 'warning';
            $priorityLabel = 'Medium';
        } elseif ($task->priority === 'high') {
            $priorityColor = 'danger';
            $priorityLabel = 'High';
        }
    @endphp

    {{-- Start Page Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fs-3 mb-1">Détails de la tâche</h1>

            <p class="text-secondary mb-0">
                Consultez toutes les informations de votre tâche.
            </p>
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-light">

            <i class="ti ti-arrow-left me-1"></i>
            Retour aux tâches
        </a>

    </div>
    {{-- End Page Header --}}

    <div class="row g-4">

        {{-- Start Main Task Card --}}
        <div class="col-xl-8 col-12">

            <article class="card overflow-hidden">

                {{-- Task Image --}}
                @if ($task->image)
                    <img src="{{ asset("storage/tasks/$task->image") }}" class="task-details-image"
                        alt="{{ $task->title }}">
                @else
                    <div
                        class="task-image-placeholder d-flex flex-column justify-content-center align-items-center bg-light">

                        <i class="ti ti-photo-off fs-1 text-secondary mb-2"></i>

                        <span class="text-secondary">
                            Aucune image disponible
                        </span>

                    </div>
                @endif

                <div class="card-body p-4 p-lg-5">

                    {{-- Status And Priority --}}
                    <div class="d-flex flex-wrap gap-2 mb-3">

                        <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }}">

                            <i class="ti {{ $statusIcon }} me-1"></i>

                            {{ $statusLabel }}

                        </span>

                        <span class="badge bg-{{ $priorityColor }}-subtle text-{{ $priorityColor }}">

                            <i class="ti ti-flag me-1"></i>

                            Priorité {{ $priorityLabel }}

                        </span>

                    </div>

                    {{-- Title --}}
                    <h2 class="mb-3">
                        {{ $task->title }}
                    </h2>

                    {{-- Description --}}
                    <div>
                        <h3 class="h6 mb-2">
                            Description
                        </h3>

                        <p class="text-secondary mb-0">
                            {{ $task->description }}
                        </p>
                    </div>

                </div>

            </article>

        </div>
        {{-- End Main Task Card --}}

        {{-- Start Information Card --}}
        <div class="col-xl-4 col-12">

            <aside class="card">

                <div class="card-header bg-transparent p-4">

                    <h2 class="h5 mb-0">
                        Informations
                    </h2>

                </div>

                <div class="card-body px-4 py-0">

                    {{-- Task ID --}}
                    <div class="task-info-item d-flex align-items-center gap-3">

                        <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle">
                            <i class="ti ti-hash"></i>
                        </div>

                        <div>
                            <small class="d-block text-secondary">
                                Numéro de la tâche
                            </small>

                            <span class="fw-semibold">
                                #{{ $task->id }}
                            </span>
                        </div>

                    </div>

                    {{-- Due Date --}}
                    <div class="task-info-item d-flex align-items-center gap-3">

                        <div class="icon-shape icon-sm bg-warning bg-opacity-10 text-warning rounded-circle">
                            <i class="ti ti-calendar-due"></i>
                        </div>

                        <div>
                            <small class="d-block text-secondary">
                                Date d’échéance
                            </small>

                            <span class="fw-semibold">
                                {{ date('d/m/Y', strtotime($task->due_date)) }}
                            </span>
                        </div>

                    </div>

                    {{-- Created At --}}
                    <div class="task-info-item d-flex align-items-center gap-3">

                        <div class="icon-shape icon-sm bg-info bg-opacity-10 text-info rounded-circle">
                            <i class="ti ti-calendar-plus"></i>
                        </div>

                        <div>
                            <small class="d-block text-secondary">
                                Date de création
                            </small>

                            <span class="fw-semibold">
                                {{ $task->created_at->format('d/m/Y') }}
                            </span>
                        </div>

                    </div>

                    {{-- Last Update --}}
                    <div class="task-info-item d-flex align-items-center gap-3">

                        <div class="icon-shape icon-sm bg-success bg-opacity-10 text-success rounded-circle">
                            <i class="ti ti-refresh"></i>
                        </div>

                        <div>
                            <small class="d-block text-secondary">
                                Dernière modification
                            </small>

                            <span class="fw-semibold">
                                {{ $task->updated_at->format('d/m/Y H:i') }}
                            </span>
                        </div>

                    </div>

                </div>

                {{-- Actions --}}
                <div class="card-footer bg-transparent border-0 p-4">

                    <div class="d-grid gap-2">

                        <!-- Start Button edit -->
                        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-primary">

                            <i class="ti ti-pencil me-1"></i>
                            Modifier la tâche
                        </a>
                        <!-- end  Button Edit -->




                        {{-- Start Delete Button --}}
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteTaskModal">

                            <i class="ti ti-trash me-1"></i>
                            Supprimer la tâche
                        </button>
                        {{-- End Delete Button --}}





                    </div>

                </div>

            </aside>

        </div>
        {{-- End Information Card --}}

    </div>

    {{-- Start Delete Confirmation Modal --}}
    <div class="modal fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow">

                {{-- Modal Header --}}
                <div class="modal-header border-0 pb-0">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer">
                    </button>

                </div>

                {{-- Modal Body --}}
                <div class="modal-body text-center px-4 pt-2 pb-4">

                    {{-- Delete Icon --}}
                    <div
                        class="icon-shape icon-lg bg-danger bg-opacity-10
                            text-danger rounded-circle mx-auto mb-4">

                        <i class="ti ti-trash fs-3"></i>
                    </div>

                    <h2 class="h4 mb-2" id="deleteTaskModalLabel">

                        Supprimer cette tâche ?
                    </h2>

                    <p class="text-secondary mb-2">
                        Vous êtes sur le point de supprimer :
                    </p>

                    <p class="fw-semibold text-dark mb-3">
                        « {{ $task->title }} »
                    </p>

                    <div
                        class="alert alert-danger bg-danger bg-opacity-10
                            border-0 text-danger small text-start">

                        <i class="ti ti-alert-triangle me-1"></i>

                        Cette action est définitive. La tâche et son image
                        seront supprimées.
                    </div>

                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer border-0 justify-content-center pt-0 pb-4">

                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">

                        <i class="ti ti-x me-1"></i>
                        Annuler
                    </button>

                    {{-- Delete Form --}}
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">

                            <i class="ti ti-trash me-1"></i>
                            Oui, supprimer
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
    {{-- End  Delete Confirmation Modal --}}

    @include('theme.partials.footer')
@endsection
