@extends('partials.layout')
@section('title', 'Login')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-base-200 px-4">
    <div class="w-full max-w-md">
        <!-- Session Status -->
        @if (session('status'))
            <div role="alert" class="alert alert-success mb-6 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">{{ __('Welcome Back') }}</h2>

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">@lang('Email')</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered @error('email') input-error @enderror"
                            value="{{ old('email') }}" placeholder="your@email.com" required autofocus autocomplete="username" />
                        @error('email')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">@lang('Password')</span>
                        </label>
                        <input type="password" name="password" class="input input-bordered @error('password') input-error @enderror"
                            placeholder="••••••••" required autocomplete="current-password" />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-3">
                            <input name="remember" type="checkbox" class="checkbox checkbox-sm" />
                            <span class="label-text">@lang('Remember me')</span>
                        </label>
                    </div>

                    <div class="divider my-4"></div>

                    <div class="flex flex-col gap-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Log in') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn btn-ghost btn-block">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <div class="text-center text-sm">
                                {{ __('Don\'t have an account?') }}
                                <a href="{{ route('register') }}" class="link link-primary font-medium">
                                    {{ __('Register') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
