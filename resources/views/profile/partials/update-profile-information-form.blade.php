<section>

    {{-- Form إرسال رابط التحقق من البريد --}}
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">

        @csrf
    </form>

    {{-- Form تعديل معلومات الحساب --}}
    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        {{-- Start Name --}}
        <div class="mb-4">

            <label for="name" class="form-label">
                Nom
            </label>

            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                placeholder="Saisir votre nom">

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        {{-- End Name --}}

        {{-- Start Email --}}
        <div class="mb-4">

            <label for="email" class="form-label">
                Adresse e-mail
            </label>

            <input type="email" name="email" id="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required autocomplete="username" placeholder="Saisir votre adresse e-mail">

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>
        {{-- End Email --}}

        {{-- Start Email Verification --}}
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())

            <div class="alert alert-warning mb-4">

                <div class="d-flex align-items-start gap-2">

                    <i class="ti ti-alert-circle fs-5 mt-1"></i>

                    <div>

                        <p class="mb-2">
                            Votre adresse e-mail n’est pas encore vérifiée.
                        </p>

                        <button type="submit" form="send-verification" class="btn btn-sm btn-outline-warning">

                            Renvoyer l’e-mail de vérification
                        </button>

                    </div>

                </div>

            </div>

            @if (session('status') === 'verification-link-sent')
                <div class="alert alert-success">
                    Un nouveau lien de vérification vous a été envoyé.
                </div>
            @endif

        @endif
        {{-- End Email Verification --}}

        {{-- Start Actions --}}
        <div class="d-flex align-items-center gap-3">

            <button type="submit" class="btn btn-primary">

                <i class="ti ti-device-floppy me-1"></i>
                Enregistrer
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small">

                    <i class="ti ti-circle-check me-1"></i>
                    Modifications enregistrées.
                </span>
            @endif

        </div>
        {{-- End Actions --}}

    </form>

</section>
