@extends('theme.master')

@section('content')

    {{-- Start Page Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">

        <div>
            <h1 class="fs-3 mb-1">
                Mon profil
            </h1>

            <p class="text-secondary mb-0">
                Gérez vos informations personnelles et la sécurité de votre compte.
            </p>
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-light">

            <i class="ti ti-arrow-left me-1"></i>
            Retour à mes tâches
        </a>

    </div>
    {{-- End Page Header --}}

    <div class="row g-4">

        {{-- Start Profile Information --}}
        <div class="col-xl-6 col-12">

            <div class="card h-100">

                <div class="card-header bg-transparent p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-shape icon-md bg-primary bg-opacity-10 text-primary rounded-circle">
                            <i class="ti ti-user-edit fs-4"></i>
                        </div>

                        <div>
                            <h2 class="h5 mb-1">
                                Informations personnelles
                            </h2>

                            <p class="text-secondary small mb-0">
                                Modifiez votre nom et votre adresse e-mail.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="card-body p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>

        </div>
        {{-- End Profile Information --}}

        {{-- Start Password --}}
        <div class="col-xl-6 col-12">

            <div class="card h-100">

                <div class="card-header bg-transparent p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-shape icon-md bg-warning bg-opacity-10 text-warning rounded-circle">
                            <i class="ti ti-lock fs-4"></i>
                        </div>

                        <div>
                            <h2 class="h5 mb-1">
                                Modifier le mot de passe
                            </h2>

                            <p class="text-secondary small mb-0">
                                Utilisez un mot de passe sécurisé pour protéger votre compte.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="card-body p-4">
                    @include('profile.partials.update-password-form')
                </div>

            </div>

        </div>
        {{-- End Password --}}

        {{-- Start Delete Account --}}
        <div class="col-12">

            <div class="card border-danger border-opacity-25">

                <div class="card-header bg-danger bg-opacity-10 border-danger border-opacity-25 p-4">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-shape icon-md bg-danger text-white rounded-circle">
                            <i class="ti ti-user-x fs-4"></i>
                        </div>

                        <div>
                            <h2 class="h5 text-danger mb-1">
                                Supprimer le compte
                            </h2>

                            <p class="text-secondary small mb-0">
                                Cette opération supprimera définitivement votre compte.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="card-body p-4">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>

        </div>
        {{-- End Delete Account --}}

    </div>

    @include('theme.partials.footer')

@endsection