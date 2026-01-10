<x-guest-layout>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">{{ __('Forgot Password?') }}</h2>

            <p class="text-sm text-base-content/70 mb-6">
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div role="alert" class="alert alert-success mb-4 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Email') }}</span>
                    </label>
                    <input id="email" type="email" name="email" class="input input-bordered @error('email') input-error @enderror"
                        value="{{ old('email') }}" placeholder="your@email.com" required autofocus />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="divider"></div>

                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Email Password Reset Link') }}
                </button>

                <a href="{{ route('login') }}" class="btn btn-ghost btn-block">
                    {{ __('Back to Login') }}
                </a>
            </form>
        </div>
    </div>
</x-guest-layout>
