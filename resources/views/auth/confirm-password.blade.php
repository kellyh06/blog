<x-guest-layout>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-4">{{ __('Confirm Password') }}</h2>

            <div class="alert alert-warning mb-6 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M7.08 6.47a9 9 0 1112.84 0" />
                </svg>
                <span>{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</span>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
                @csrf

                <!-- Password -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Password') }}</span>
                    </label>
                    <input id="password" type="password" name="password" class="input input-bordered @error('password') input-error @enderror"
                        placeholder="••••••••" required autocomplete="current-password" />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="divider"></div>

                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Confirm') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
