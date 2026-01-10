<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-error">
            {{ __('Delete Account') }}
        </h2>

        <p class="text-base-content/70 mt-2">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <div class="flex items-center gap-4">
        <button type="button" class="btn btn-error" onclick="delete_modal.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            {{ __('Delete Account') }}
        </button>
    </div>

    <!-- Delete Confirmation Modal -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box bg-base-100">
            <h3 class="font-bold text-lg text-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4v.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ __('Are you sure you want to delete your account?') }}
            </h3>

            <p class="py-4 text-base-content/70">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form id="delete-account" method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <!-- Password -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text font-medium">{{ __('Password') }}</span>
                    </label>
                    <input type="password" name="password" class="input input-bordered @error('password') input-error @enderror"
                        placeholder="••••••••" required autocomplete="current-password" />
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>
            </form>

            <div class="modal-action">
                <form method="dialog" class="flex gap-2 w-full">
                    <button type="button" class="btn btn-ghost flex-1">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="btn btn-error flex-1" form="delete-account">
                        {{ __('Delete Account') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Modal Backdrop -->
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
</section>
