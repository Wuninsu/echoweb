<section class="w-100">
    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <form wire:submit.prevent="updatePassword" class="mt-4">
            <div class="mb-3">
                <label for="current_password" class="form-label mb-0">{{ __('Current password') }}</label>
                <input type="password" wire:model="current_password"
                    class="form-control  @error('current_password') border-danger is-invalid @enderror"
                    id="current_password" autocomplete="current-password">
                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label mb-0">{{ __('New password') }}</label>
                <input type="password" wire:model="password" class="form-control"
                    id="password  @error('password') border-danger is-invalid @enderror" autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label mb-0">{{ __('Confirm Password') }}</label>
                <input type="password" wire:model="password_confirmation"
                    class="form-control  @error('password_confirmation') border-danger is-invalid @enderror"
                    id="password_confirmation" autocomplete="new-password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary w-100">{{ __('Save') }}</button>

                <x-action-message class="ms-3" on="password-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>
