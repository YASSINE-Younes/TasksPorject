@extends('theme.master')

@section('title', 'Modifier la tâche')


@section('content')
    <style>
        .current-task-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            border-radius: 8px;
        }

        .current-image-placeholder {
            width: 100%;
            height: 240px;
            border-radius: 8px;
        }
    </style>

    {{-- Start Page Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fs-3 mb-1">
                Modifier la tâche
            </h1>

            <p class="text-secondary mb-0">
                Modifiez les informations et l’état de votre tâche.
            </p>
        </div>

        <a href="{{ route('tasks.show', $task) }}" class="btn btn-light">

            <i class="ti ti-arrow-left me-1"></i>
            Retour aux détails
        </a>

    </div>
    {{-- End Page Header --}}




    <form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}" enctype="multipart/form-data" id="editTaskForm"
        class="row g-4">
        @csrf
        @method('PUT')

        {{-- Start Edit Form --}}


        {{-- Start Current Image --}}
        <div class="col-xl-4 col-12">


            <div class="card h-100">

                <div class="card-header bg-transparent p-4">
                    <h2 class="h5 mb-0">
                        Image actuelle
                    </h2>
                </div>

                <div class="card-body p-4 pt-0">

                    @if ($task->image)
                        <img src="{{ asset("storage/tasks/$task->image") }}" class="current-task-image"
                            alt="{{ $task->title }}">
                    @else
                        <div
                            class="current-image-placeholder d-flex flex-column justify-content-center align-items-center bg-light">

                            <i class="ti ti-photo-off fs-1 text-secondary mb-2"></i>

                            <span class="text-secondary">
                                Aucune image disponible
                            </span>

                        </div>
                    @endif




                    <div class="mt-4">

                        <label for="taskImage" class="form-label">

                            Remplacer l’image
                        </label>

                        <input name ="image" type="file" id="taskImage" class="form-control" accept="image/*">

                        <!-- Start Message Erreur TITLE VALIDATION -->
                        @error('image')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <!-- Start Message Erreur TITLE VALIDATION -->

                        <small class="text-secondary d-block mt-2">
                            Laissez ce champ vide pour conserver l’image actuelle.
                        </small>

                    </div>

                </div>

            </div>

        </div>

        {{-- End Current Image --}}


        <div class="col-xl-8 col-12">

            <div class="card">

                <div class="card-header bg-transparent p-4">

                    <div class="d-flex align-items-center gap-2">

                        <div class="icon-shape icon-sm bg-primary bg-opacity-10 text-primary rounded-circle">
                            <i class="ti ti-pencil"></i>
                        </div>

                        <h2 class="h5 mb-0">
                            Informations de la tâche
                        </h2>

                    </div>

                </div>

                <!-- ++++++++ Start Message ajouter avec succees +++++++++++ -->
                @if (session('update-task'))
                    <div class="alert alert-success">
                        {{ session('update-task') }}
                    </div>
                @endif
                <!-- ++++++++ END Message ajouter avec succees +++++++++++ -->

                <div class="card-body p-4">



                    {{-- Title --}}
                    <div class="mb-4">

                        <label for="taskTitle" class="form-label">

                            Titre
                        </label>

                        <input name ="title" type="text" id="taskTitle" class="form-control" value="{{ $task->title }}"
                            placeholder="Saisir le titre de la tâche">




                        <!-- Start Message Erreur TITLE VALIDATION -->
                        @error('title')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <!-- Start Message Erreur TITLE VALIDATION -->

                    </div>

                    {{-- Description --}}
                    <div class="mb-4">

                        <label for="taskDescription" class="form-label">

                            Description
                        </label>

                        <textarea name ="description" id="taskDescription" class="form-control" rows="5"
                            placeholder="Saisir la description de la tâche">{{ $task->description }}</textarea>




                        <!-- Start Message Erreur description VALIDATION -->
                        @error('description')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <!-- Start Message Erreur description VALIDATION -->

                    </div>

                    <div class="row">

                        {{-- Status --}}
                        <div class="col-md-6 mb-4">

                            <label for="taskStatus" class="form-label">

                                Statut
                            </label>

                            <select name ="status" id="taskStatus" class="form-select">

                                <option value="pending" @selected($task->status === 'pending')>
                                    Pending
                                </option>

                                <option value="in_progress" @selected($task->status === 'in_progress')>
                                    In Progress
                                </option>

                                <option value="completed" @selected($task->status === 'completed')>
                                    Completed
                                </option>

                            </select>

                            <!-- Start Message Erreur priority VALIDATION -->
                            @error('status')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                            <!-- Start Message Erreur priority VALIDATION -->

                        </div>

                        {{-- Priority --}}
                        <div class="col-md-6 mb-4">

                            <label for="taskPriority" class="form-label">

                                Priorité
                            </label>

                            <select name ="priority" id="taskPriority" class="form-select">

                                <option value="low" @selected($task->priority === 'low')>
                                    Low
                                </option>

                                <option value="medium" @selected($task->priority === 'medium')>
                                    Medium
                                </option>

                                <option value="high" @selected($task->priority === 'high')>
                                    High
                                </option>

                            </select>

                            <!-- Start Message Erreur priority VALIDATION -->
                            @error('priority')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                            <!-- Start Message Erreur priority VALIDATION -->

                        </div>

                    </div>

                    {{-- Due Date --}}
                    <div class="mb-4">

                        <label for="taskDueDate" class="form-label">

                            Date d’échéance
                        </label>

                        <input name ="due_date" type="date" id="taskDueDate" class="form-control"
                            value="{{ date('Y-m-d', strtotime($task->due_date)) }}">

                        <!-- Start Message Erreur due_date VALIDATION -->
                        @error('due_date')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                        <!-- Start Message Erreur due_date VALIDATION -->

                    </div>

                    {{-- Information --}}
                    <div class="alert alert-light border d-flex align-items-center gap-2">

                        <i class="ti ti-info-circle text-primary"></i>

                        <span>
                            Dernière modification :
                            <strong>{{ $task->updated_at->format('d/m/Y H:i') }}</strong>
                        </span>

                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">

                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-light">

                            Annuler
                        </a>

                        <button type="submit" class="btn btn-primary">

                            <i class="ti ti-device-floppy me-1"></i>
                            Enregistrer les modifications
                        </button>

 
                    </div>



                </div>

            </div>

        </div>
    </form>
    {{-- End Edit Form --}}



    @include('theme.partials.footer')
@endsection
