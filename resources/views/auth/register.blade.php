<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <!-- Toggle button -->
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5"
                    onclick="togglePassword()">
                    <svg id="eye-icon" class="h-5 w-5 text-gray-500 dark:text-gray-300" fill="none"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eye-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                        <path id="eye-closed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z" class="hidden" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <!-- Toggle button for Confirm Password -->
                <button type="button"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100"
                    onclick="toggleConfirmPassword()">
                    <svg id="eye-icon-confirm" class="h-5 w-5" fill="none" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eye-open-confirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" />
                        <path id="eye-closed-confirm" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12s3-7 9-7 9 7 9 7-3 7-9 7-9-7-9-7z" class="hidden" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            passwordField.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
    }

    function toggleConfirmPassword() {
        const passwordField = document.getElementById('password_confirmation');
        const eyeOpen = document.getElementById('eye-open-confirm');
        const eyeClosed = document.getElementById('eye-closed-confirm');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeOpen.classList.add('hidden');
            eyeClosed.classList.remove('hidden');
        } else {
            passwordField.type = 'password';
            eyeOpen.classList.remove('hidden');
            eyeClosed.classList.add('hidden');
        }
    }
</script>