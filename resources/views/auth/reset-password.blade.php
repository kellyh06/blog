<x-guest-layout>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-2xl mb-6">{{ __('Reset Password') }}</h2>

            <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Email') }}</span>
                    </label>
                    <input id="email" type="email" name="email" class="input input-bordered @error('email') input-error @enderror"
                        value="{{ old('email', $request->email) }}" placeholder="your@email.com" required autofocus autocomplete="username" />
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Password') }}</span>
                    </label>
                    <input id="password" type="password" name="password" class="input input-bordered @error('password') input-error @enderror"
                        placeholder="••••••••" required autocomplete="new-password" />
                    @error('password')
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
                    <input id="password_confirmation" type="password" name="password_confirmation" class="input input-bordered @error('password_confirmation') input-error @enderror"
                        placeholder="••••••••" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="divider"></div>

                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
