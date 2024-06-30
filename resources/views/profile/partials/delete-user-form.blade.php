<style>
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 0.375rem;
        background-color: #fff;
        color: #333;
        transition: border-color 0.2s;
    }

    .form-control:focus {
        border-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 0.75rem 1.25rem;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: #a71d2a;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        padding: 0.75rem 1.25rem;
        border-radius: 0.375rem;
        border: none;
        cursor: pointer;
    }

    .btn-secondary:hover {
        background-color: #565e64;
    }
</style>

<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="form-group">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <button type="button" class="btn-secondary" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn-danger ms-3">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
