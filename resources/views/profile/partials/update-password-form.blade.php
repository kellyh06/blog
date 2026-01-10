<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-base-content">
            {{ __('Update Password') }}
        </h2>

        <p class="text-base-content/70 mt-2">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">{{ __('Current Password') }}</span>
            </label>
            <input type="password" name="current_password" class="input input-bordered @error('current_password', 'updatePassword') input-error @enderror"
                placeholder="••••••••" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- New Password -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">{{ __('New Password') }}</span>
            </label>
            <input type="password" name="password" class="input input-bordered @error('password', 'updatePassword') input-error @enderror"
                placeholder="••••••••" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-control">
            <label class="label">
                <span class="label-text font-medium">{{ __('Confirm Password') }}</span>
            </label>
            <input type="password" name="password_confirmation" class="input input-bordered @error('password_confirmation', 'updatePassword') input-error @enderror"
                placeholder="••••••••" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4 pt-4 border-t border-base-300">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'password-updated')
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
