<section>

    <form method="POST"
          action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        {{-- Start Current Password --}}
        <div class="mb-4">

            <label for="update_password_current_password"
                   class="form-label">

                Mot de passe actuel
            </label>

            <input type="password"
                   name="current_password"
                   id="update_password_current_password"
                   class="form-control
                   @error('current_password', 'updatePassword') is-invalid @enderror"
                   autocomplete="current-password"
                   placeholder="Saisir votre mot de passe actuel">

            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        {{-- End Current Password --}}

        {{-- Start New Password --}}
        <div class="mb-4">

            <label for="update_password_password"
                   class="form-label">

                Nouveau mot de passe
            </label>

            <input type="password"
                   name="password"
                   id="update_password_password"
                   class="form-control
                   @error('password', 'updatePassword') is-invalid @enderror"
                   autocomplete="new-password"
                   placeholder="Saisir un nouveau mot de passe">

            @error('password', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        {{-- End New Password --}}

        {{-- Start Password Confirmation --}}
        <div class="mb-4">

            <label for="update_password_password_confirmation"
                   class="form-label">

                Confirmer le nouveau mot de passe
            </label>

            <input type="password"
                   name="password_confirmation"
                   id="update_password_password_confirmation"
                   class="form-control
                   @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                   autocomplete="new-password"
                   placeholder="Confirmer le nouveau mot de passe">

            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        {{-- End Password Confirmation --}}

        {{-- Start Actions --}}
        <div class="d-flex align-items-center gap-3">

            <button type="submit" class="btn btn-primary">

                <i class="ti ti-lock-check me-1"></i>
                Modifier le mot de passe
            </button>

            @if (session('status') === 'password-updated')

                <span class="text-success small">

                    <i class="ti ti-circle-check me-1"></i>
                    Mot de passe modifié.
                </span>

            @endif

        </div>
        {{-- End Actions --}}

    </form>

</section>