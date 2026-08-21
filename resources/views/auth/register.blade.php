<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Signup - InApp Inventory Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/favicon_io/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon_io/favicon-16x16.png">
  <link rel="manifest" href="./assets/images/favicon_io/site.webmanifest">
@vite(['resources/js/app.js'])
</head>

<body>


<div class="container d-flex align-items-center justify-content-center min-vh-100">
  <div class="card " style="max-width:420px; width:100%;">
    <div class="card-body p-5">
      <div class="text-center mb-3">
     <a href="index.html" class="mb-4 d-inline-block"><img src="./assets/images/logo-icon.svg" alt="" width="36">
      <span class="ms-2"> <img src="./assets/images/logo.svg" alt=""></span>
      </a>
        <h1 class="card-title mb-5 h5">Create your account</h1>

      </div>

      <!-- Form -->

 <form method="POST" action="{{ route('register') }}" class="needs-validation mt-3" novalidate>
        @csrf

      
         <!-- Name -->
        <div class="mb-3">
          <label for="fullName" class="form-label">Full name</label>
          <!-- Input Name -->
          <input name="name" :value="old('name')" id="fullName" type="text" class="form-control" placeholder="Jane Doe" required>

          <!-- error input name-->
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


         <!-- Email Address -->
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          
          <!-- Input email -->
          <input name="email" :value="old('email')"  id="email" type="email" class="form-control" placeholder="name@example.com" required>
    
          <!-- error input email-->
           <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
         
          <!-- Input Password -->
          <input name="password" id="password" type="password" class="form-control" placeholder="Create a password" required >
         
          <!-- error Password -->
           <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


           <!-- Confirm Password -->
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirm password</label>
         
         <!-- Input Confirm Password -->
          <input  name="password_confirmation" id="confirmPassword" type="password" class="form-control" placeholder="Repeat password" required
            oninput="this.setCustomValidity(document.getElementById('password').value !== this.value ? 'Passwords do not match.' : '')">
         
         <!-- error Confirm Password -->
              <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- <div class="mb-3 form-check">
          <input id="terms" class="form-check-input" type="checkbox" required>
          <label class="form-check-label small" for="terms">I agree to the <a href="#" class="text-decoration-none">terms and privacy</a></label>
          <div class="invalid-feedback">You must agree before continuing.</div>
        </div> --}}

        <button class="btn btn-primary w-100" type="submit">Sign up</button>
      </form>

      <div class="text-center mt-3 small text-muted">
        Already have an account? <a href="{{ route('login') }}" class="link-primary">Sign in</a>
      </div>
    </div>
  </div>
</div>



  <!-- Bootstrap JS -->
  {{-- <script src="./assets/js/main.js" type="module"></script> --}}


</body>

</html>""





{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
