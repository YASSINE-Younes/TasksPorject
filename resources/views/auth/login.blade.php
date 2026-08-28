<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
   
    <title>Connexion - Gestion de tâches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon_io/apple-touch-icon.png') }}">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon_io/favicon-32x32.png') }}">

    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/images/favicon_io/favicon-16x16.png') }}">

    <link rel="manifest" href="{{ asset('assets/images/favicon_io/site.webmanifest') }}">

    
    @vite(['resources/js/app.js'])


</head>

<body>


    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card " style="max-width:420px; width:100%;">
            <div class="card-body p-5">
                <div class="text-center mb-3">
                
                        <a href="{{ route('login') }}" class="mb-4 d-inline-block">

                            <img src="{{ asset('assets/images/logo.svg') }}" alt="Gestion de tâches">


                        </a>
                        <h1 class="card-title mb-5 h5">Connectez-vous à votre compte</h1>

                </div>


                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />


                <!-- Form-->
                <form method="POST" action="{{ route('login') }}" class="needs-validation mt-3" novalidate>

                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email </label>
                        <!-- Email Input -->
                        <input id="email" type="email" class="form-control" placeholder="nom@example.com" required
                            autofocus name="email" value="{{ old('email') }}" autocomplete="email">

                        <!-- Message ERROR EMAIL -->
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>



                    <div class="mb-3">
                        <label for="password" class="form-label d-flex justify-content-between">
                            <span>Mot de passe</span>

                        </label>

                        <!-- Password Input -->
                        <input id="password" name="password" type="password" class="form-control"
                            placeholder="Mot de passe" required autocomplete="current-password">

                      <!-- Message ERROR PASSWORD -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>



                    <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                </form>

                <div class="text-center mt-3 small text-muted">
                    Vous n'avez pas de compte ?
                    <a href="{{ route('register') }}" class="link-primary">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>






</body>

</html>
