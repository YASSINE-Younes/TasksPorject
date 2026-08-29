<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        Gestion de tâches - Page introuvable
    </title>

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon_io/favicon.png') }}"
    >

    @vite(['resources/js/app.js'])

    <style>
        .error-page {
            min-height: 100vh;
        }

        .error-visual {
            position: relative;
            min-height: 380px;
            overflow: hidden;
            background:
                linear-gradient(
                    135deg,
                    rgba(48, 44, 77, 0.08),
                    rgba(230, 98, 57, 0.14)
                );
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

        .error-icon {
            position: relative;
            z-index: 2;
            width: 130px;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            background-color: #e66239;
            border-radius: 35px;
            box-shadow: 0 20px 40px rgba(230, 98, 57, 0.25);
            transform: rotate(-8deg);
        }

        .error-icon i {
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

        .error-logo {
            max-width: 220px;
        }

        [data-bs-theme="dark"] .error-number {
            color: rgba(255, 255, 255, 0.06);
        }
    </style>

</head>

<body>

    <div class="error-page d-flex align-items-center py-5">

        <div class="container">

            {{-- Logo --}}
            <div class="text-center mb-5">

                <a href="{{ url('/') }}">

                    <img
                        src="{{ asset('assets/images/logo.svg') }}"
                        alt="Gestion de tâches"
                        class="error-logo"
                    >

                </a>

            </div>


            <div class="row align-items-center g-5">

                {{-- Visual Side --}}
                <div class="col-lg-6">

                    <div
                        class="error-visual d-flex align-items-center justify-content-center"
                    >

                        <span class="error-number">
                            404
                        </span>

                        <div class="error-icon">

                            <i class="ti ti-file-search"></i>

                        </div>

                    </div>

                </div>


                {{-- Content Side --}}
                <div class="col-lg-6">

                    <span class="error-label mb-3">

                        <i class="ti ti-alert-circle me-1"></i>
                        Erreur 404

                    </span>


                    <h1 class="display-6 fw-bold mb-3">
                        Page introuvable
                    </h1>


                    <p class="text-secondary fs-5 mb-2">
                        La page que vous recherchez n’existe pas.
                    </p>


                    <p class="text-secondary mb-4">
                        Elle a peut-être été supprimée, déplacée ou l’adresse saisie est incorrecte.
                    </p>


                    <div class="d-flex flex-wrap gap-2">

                        @auth

                            <a
                                href="{{ route('theme.dashboard') }}"
                                class="btn btn-primary"
                            >

                                <i class="ti ti-home me-1"></i>
                                Tableau de bord

                            </a>

                            <a
                                href="{{ route('tasks.index') }}"
                                class="btn btn-outline-secondary"
                            >

                                <i class="ti ti-list-check me-1"></i>
                                Mes tâches

                            </a>

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="btn btn-primary"
                            >

                                <i class="ti ti-login me-1"></i>
                                Se connecter

                            </a>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>