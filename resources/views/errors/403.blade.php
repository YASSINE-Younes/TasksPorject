@extends('theme.master')

@section('title', 'Accès interdit')

@section('content')

    <style>
        .error-page {
            min-height: 75vh;
        }

        .error-visual {
            position: relative;
            min-height: 350px;
            overflow: hidden;
            background:
                linear-gradient(135deg,
                    rgba(48, 44, 77, 0.08),
                    rgba(230, 98, 57, 0.14));
            border-radius: 24px;
        }

        .error-number {
            position: absolute;
            color: rgba(48, 44, 77, 0.08);
            font-size: 190px;
            font-weight: 800;
            line-height: 1;
            user-select: none;
        }

        .error-shield {
            position: relative;
            z-index: 2;
            width: 130px;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background: #e66239;
            border-radius: 35px;
            box-shadow: 0 20px 40px rgba(230, 98, 57, 0.25);
            transform: rotate(-8deg);
        }

        .error-shield i {
            font-size: 65px;
            transform: rotate(8deg);
        }

        .error-label {
            display: inline-flex;
            align-items: center;
            padding: 7px 14px;
            color: #e66239;
            background-color: rgba(230, 98, 57, 0.12);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
        }

        [data-bs-theme="dark"] .error-number {
            color: rgba(255, 255, 255, 0.06);
        }
    </style>


    <div class="error-page d-flex align-items-center py-5">

        <div class="container">

            <div class="row align-items-center g-5">

                {{-- Visual Side --}}
                <div class="col-lg-6">

                    <div class="error-visual d-flex align-items-center justify-content-center">

                        <span class="error-number">
                            403
                        </span>

                        <div class="error-shield">

                            <i class="ti ti-shield-lock"></i>

                        </div>

                    </div>

                </div>


                {{-- Content Side --}}
                <div class="col-lg-6">

                    <span class="error-label mb-3">

                        <i class="ti ti-alert-circle me-1"></i>
                        Erreur 403

                    </span>


                    <h1 class="display-6 fw-bold mb-3">
                        Cette page n’est pas accessible
                    </h1>


                    <p class="text-secondary fs-5 mb-2">
                        Vous ne disposez pas des autorisations nécessaires.
                    </p>


                    <p class="text-secondary mb-4">

                        {{ $exception->getMessage() ?: 'Vous n’êtes pas autorisé à accéder à cette page.' }}

                    </p>


                    <div class="d-flex flex-wrap gap-2">

                        <a href="{{ route('tasks.index') }}" class="btn btn-primary">

                            <i class="ti ti-list-check me-1"></i>
                            Retour à mes tâches

                        </a>

                        <a href="{{ route('theme.dashboard') }}" class="btn btn-outline-secondary">

                            <i class="ti ti-home me-1"></i>
                            Tableau de bord

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
