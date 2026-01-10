<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-base-content">
            {{ __('Profile Information') }}
        </h2>
        <p class="text-base-content/70 mt-2">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">{{ __('Name') }}</span>
            </label>
            <input type="text" name="name" class="input input-bordered @error('name') input-error @enderror"
                value="{{ old('name', $user->name) }}" placeholder="Your name" required autofocus autocomplete="name" />
            @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">{{ __('Email') }}</span>
            </label>
            <input type="email" name="email" class="input input-bordered @error('email') input-error @enderror"
                value="{{ old('email', $user->email) }}" placeholder="your@email.com" required autocomplete="username" />
            @error('email')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror

            <!-- Email Verification Status -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="alert alert-warning mt-4 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="font-bold">{{ __('Email Unverified') }}</h3>
                        <p class="text-sm">{{ __('Your email address is unverified.') }}</p>
                        <button type="button" form="send-verification" class="link link-primary text-sm mt-1">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <div role="alert" class="alert alert-success mt-4 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ __('A new verification link has been sent to your email address.') }}</span>
                    </div>
                @endif
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4 border-t border-base-300">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="flex items-center gap-2 text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ __('Saved successfully') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
