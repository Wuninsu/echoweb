<div>
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-3">
                <h2 class="h4 fw-semibold">{{ __('Forgot password') }}</h2>
                <p class="text-muted">{{ __('Enter your email to receive a password reset link') }}</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form wire:submit.prevent="sendPasswordResetLink" class="d-flex flex-column gap-3">
                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input type="email" id="email" class="form-control" wire:model="email"
                        placeholder="email@example.com" required autofocus />
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Email password reset link') }}
                </button>
            </form>

            <div class="text-center text-muted small mt-3">
                {{ __('Or, return to') }}
                <a href="{{ route('login') }}" wire:navigate class="text-decoration-none">
                    {{ __('log in') }}
                </a>
            </div>
        </div>
    </div>
</div>
