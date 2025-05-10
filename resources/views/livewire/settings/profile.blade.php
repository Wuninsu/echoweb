<section class="w-full">
    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit.prevent="updateProfileInformation" class="my-4 w-100" enctype="multipart/form-data">
            @csrf

            {{-- Avatar --}}
            <div class="mb-3">
                <label for="avatar" class="form-label mb-0">{{ __('Avatar') }}</label>

                @if ($avatar)
                    <div class="mb-2">
                        <img src="{{ $avatar->temporaryUrl() }}" alt="Preview" width="80" class="rounded-circle">
                    </div>
                @elseif (auth()->user()->avatar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/avatars/' . auth()->user()->avatar) }}" alt="Current Avatar" width="80"
                            class="rounded-circle">
                    </div>
                @endif

                <input wire:model="avatar" type="file" class="form-control" id="avatar" accept="image/*">
                @error('avatar')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Other fields below remain unchanged --}}
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label mb-0">{{ __('Username') }}</label>
                <input wire:model="username" type="text" class="form-control" id="username" required autofocus
                    autocomplete="username">
                @error('username') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label mb-0">{{ __('Name') }}</label>
                <input wire:model="name" type="text" class="form-control" id="name" required autofocus
                    autocomplete="name">
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label for="phone" class="form-label mb-0">{{ __('Phone') }}</label>
                <input wire:model="phone" type="text" class="form-control" id="phone" required autofocus
                    autocomplete="phone">
                @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Email (unchanged) -->
            <div class="mb-3">
                <label for="email" class="form-label mb-0">{{ __('Email') }}</label>
                <input wire:model="email" type="email" class="form-control" id="email" required autocomplete="email">
                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                    <div class="mt-3">
                        <p class="text-muted mb-2">{{ __('Your email address is unverified.') }}</p>
                        <button wire:click.prevent="resendVerificationNotification" type="button"
                            class="btn btn-link p-0 text-sm">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success fw-medium mt-2">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3 mt-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                <x-action-message class="ms-3" on="profile-updated">{{ __('Saved.') }}</x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>