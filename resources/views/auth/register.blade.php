<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Gestion de tâches - Inscription </title>


    {{-- Favicon --}}
    <link 
        rel="icon"
        type="image/png"
        href="{{ asset('assets/images/favicon_io/favicon.png') }}"
        >
    



    @vite(['resources/js/app.js'])

</head>

<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100 py-4">

        <div class="card" style="max-width: 420px; width: 100%;">

            <div class="card-body p-5">

                {{-- Page Header --}}
                <div class="text-center mb-3">

                    <a href="{{ route('register') }}" class="mb-4 d-inline-block">

                        <img src="{{ asset('assets/images/logo.svg') }}" alt="Gestion de tâches">

                    </a>

                    <h1 class="card-title mb-5 h5">
                        Créez votre compte
                    </h1>

                </div>


                {{-- Register Form --}}
                <form method="POST" action="{{ route('register') }}" class="mt-3" novalidate>

                    @csrf


                    {{-- Name --}}
                    <div class="mb-3">

                        <label for="name" class="form-label">
                            Nom et prénom
                        </label>

                        <input id="name" name="name" type="text" class="form-control"
                            placeholder="Entrez votre nom complet" value="{{ old('name') }}" autocomplete="name"
                            required autofocus>

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>


                    {{-- Email --}}
                    <div class="mb-3">

                        <label for="email" class="form-label">
                            E-mail
                        </label>

                        <input id="email" name="email" type="email" class="form-control"
                            placeholder="nom@example.com" value="{{ old('email') }}" autocomplete="email" required>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>


                    {{-- Password --}}
                    <div class="mb-3">

                        <label for="password" class="form-label">
                            Mot de passe
                        </label>

                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Créez un mot de passe" autocomplete="new-password" required>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>


                    {{-- Password Confirmation --}}
                    <div class="mb-3">

                        <label for="password_confirmation" class="form-label">

                            Confirmez le mot de passe

                        </label>

                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control" placeholder="Confirmez le mot de passe" autocomplete="new-password"
                            required>

                    </div>


                    <button type="submit" class="btn btn-primary w-100">
                        S'inscrire
                    </button>

                </form>


                {{-- Login Link --}}
                <div class="text-center mt-3 small text-muted">

                    Vous avez déjà un compte ?

                    <a href="{{ route('login') }}" class="link-primary">
                        Se connecter
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
