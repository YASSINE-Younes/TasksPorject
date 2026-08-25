<section>

    {{-- Warning --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

        <div>
            <p class="text-secondary mb-1">
                La suppression de votre compte est définitive.
            </p>

            <small class="text-danger">
                Toutes vos informations seront définitivement supprimées.
            </small>
        </div>

        <button type="button"
                id="openDeleteModalButton"
                class="btn btn-outline-danger"
                data-bs-toggle="modal"
                data-bs-target="#confirmUserDeletionModal">

            <i class="ti ti-trash me-1"></i>
            Supprimer mon compte
        </button>

    </div>

    {{-- Start Confirmation Modal --}}
    <div class="modal fade"
         id="confirmUserDeletionModal"
         tabindex="-1"
         aria-labelledby="confirmUserDeletionModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                {{-- Modal Header --}}
                <div class="modal-header border-bottom">

                    <div class="d-flex align-items-center gap-3">

                        <div class="icon-shape icon-md bg-danger bg-opacity-10 text-danger rounded-circle">

                            <i class="ti ti-alert-triangle fs-4"></i>
                        </div>

                        <div>
                            <h2 class="modal-title h5 mb-1"
                                id="confirmUserDeletionModalLabel">

                                Confirmer la suppression
                            </h2>

                            <small class="text-secondary">
                                Cette action est irréversible.
                            </small>
                        </div>

                    </div>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Fermer">
                    </button>

                </div>

                {{-- Delete Form --}}
                <form method="POST"
                      action="{{ route('profile.destroy') }}">

                    @csrf
                    @method('DELETE')

                    {{-- Modal Body --}}
                    <div class="modal-body p-4">

                        <p class="text-secondary">
                            Êtes-vous sûr de vouloir supprimer définitivement
                            votre compte et toutes ses données ?
                        </p>

                        <p class="mb-4">
                            Saisissez votre mot de passe pour confirmer.
                        </p>

                        <label for="delete_account_password"
                               class="form-label">

                            Mot de passe
                        </label>

                        <input type="password"
                               name="password"
                               id="delete_account_password"
                               class="form-control
                               @error('password', 'userDeletion') is-invalid @enderror"
                               autocomplete="current-password"
                               placeholder="Saisir votre mot de passe">

                        @error('password', 'userDeletion')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    {{-- Modal Footer --}}
                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-light"
                                data-bs-dismiss="modal">

                            Annuler
                        </button>

                        <button type="submit"
                                class="btn btn-danger">

                            <i class="ti ti-trash me-1"></i>
                            Supprimer définitivement
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
    {{-- End Confirmation Modal --}}

    {{-- Reopen Modal When Validation Fails --}}
    @if ($errors->userDeletion->isNotEmpty())

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('openDeleteModalButton').click();
            });
        </script>

    @endif

</section>