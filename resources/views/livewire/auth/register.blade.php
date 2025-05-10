<div class="">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column gap-4">
                <!-- Header -->
                <div class="text-center">
                    <h2 class="h4 fw-semibold">{{ __('Create an account') }}</h2>
                    <p class="text-muted">{{ __('Enter your details below to create your account') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Registration Form -->
                <form wire:submit.prevent="register" class="d-flex flex-column gap-3">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="username" class="form-label mb-0">{{ __('Username') }}</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            wire:model.defer="username" placeholder="{{ __('User name') }}" autocomplete="username" autofocus />
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label mb-0">{{ __('Email address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            wire:model.defer="email" placeholder="email@example.com" autocomplete="email" />
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label mb-0">{{ __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" wire:model.defer="password" placeholder="{{ __('Password') }}"
                            autocomplete="new-password" />
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label mb-0">{{ __('Confirm password') }}</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" wire:model.defer="password_confirmation"
                            placeholder="{{ __('Confirm password') }}" autocomplete="new-password" />
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Create account') }}
                    </button>
                </form>

                <!-- Login Link -->
                <div class="text-center text-muted small mt-3">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" wire:navigate class="text-decoration-none">
                        {{ __('Log in') }}
                    </a>
                </div>
            </div>


        </div>
    </div>
</div>
