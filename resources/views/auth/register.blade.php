@extends('partials.layout')
@section('title', 'Register')
@section('content')
<div class="min-h-screen flex items-center justify-center bg-base-200 px-4">
    <div class="w-full max-w-md">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">{{ __('Create Account') }}</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">@lang('Name')</span>
                        </label>
                        <input type="text" name="name" class="input input-bordered @error('name') input-error @enderror"
                            value="{{ old('name') }}" placeholder="Your name" required autofocus autocomplete="name" />
                        @error('name')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text font-medium">@lang('Email')</span>
                        </label>
                        <input type="email" name="email" class="input input-bordered @error('email') input-error @enderror"
                            value="{{ old('email') }}" placeholder="your@email.com" required autocomplete="username" />
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
                            <span class="label-text font-medium">@lang('Confirm Password')</span>
                        </label>
                        <input type="password" name="password_confirmation" class="input input-bordered @error('password_confirmation') input-error @enderror"
                            placeholder="••••••••" required autocomplete="new-password" />
                        @error('password_confirmation')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>

                    <div class="divider my-4"></div>

                    <div class="flex flex-col gap-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Register') }}
                        </button>

                        <div class="text-center text-sm">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="link link-primary font-medium">
                                {{ __('Log in') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
