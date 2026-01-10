@extends('partials.layout')
@section('title', 'Profile')
@section('content')
<div class="min-h-screen bg-base-200 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Page Title -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-base-content">{{ __('Profile') }}</h1>
            <p class="text-base-content/70 mt-2">{{ __('Manage your account settings and preferences') }}</p>
        </div>

        <div class="space-y-6">
            <!-- Update Profile Information -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="card bg-base-100 shadow-xl border-l-4 border-error">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
