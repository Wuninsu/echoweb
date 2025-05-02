<section class="mt-0">
    <div class="mb-4">
        <h2 class="h5">{{ __('Delete account') }}</h2>
        <p class="text-muted">{{ __('Delete your account and all of its resources') }}</p>
    </div>

    <!-- Trigger button for modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Delete account') }}
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="confirmUserDeletionModal" tabindex="-1"
        aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <form wire:submit.prevent="deleteUser">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionLabel">
                            {{ __('Are you sure you want to delete your account?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="{{ __('Close') }}"></button>
                    </div>

                    <div class="modal-body">
                        <p class="mb-3">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mb-3">
                            <label for="deletePassword" class="form-label">{{ __('Password') }}</label>
                            <input wire:model="password" type="password" id="deletePassword"
                                class="form-control @error('password') border-danger is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Delete account') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
