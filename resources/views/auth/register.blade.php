<x-guest-layout>
    <div class="w-[90%] lg:w-[40%] m-auto bg-lightprimary px-10 py-12 rounded-lg my-20">
        <div class="flex items-center flex-col mb-10">
            <div>
                <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset="" class="w-24">
            </div>
            <h1 class="text-3xl font-bold text-darkprimary">Sign Up</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
    
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <button type="submit"
                class="py-2 mt-4 justify-center items-center w-full flex gap-x-3 rounded-lg bg-gradient-to-r from-primary to-secondary text-white font-bold hover:bg-gradient-to-l transition-all">
                {{ __('Sign Up') }}
            </button>

            <div class="flex items-center justify-center mt-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">Already have an account? &nbsp;</p>
                <a class="underline text-sm text-primary font-semibold dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    Login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
