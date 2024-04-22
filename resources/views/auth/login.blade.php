<x-guest-layout>
    <div class="w-[90%] lg:w-[40%] m-auto bg-lightprimary px-10 py-16 rounded-lg my-20">
        <div class="flex items-center flex-col mb-10">
            <div>
                <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset="" class="w-24">
            </div>
            <h1 class="text-3xl font-bold text-darkprimary">Login</h1>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button type="submit"
                class="py-2 mt-4 justify-center items-center w-full flex gap-x-3 rounded-lg bg-gradient-to-r from-primary to-secondary text-white font-bold hover:bg-gradient-to-l transition-all">
                {{ __('Log in') }}
            </button>

            {{-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div> --}}

            <div class="flex items-center justify-center mt-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">Don't have an account? &nbsp;</p>
                <a class="underline text-sm text-primary font-semibold dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('register') }}">
                    Signup
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>