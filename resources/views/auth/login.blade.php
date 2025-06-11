<x-guest-layout title="Login">
    <div class="flex flex-col gap-6">
        <x-header title="Log in to your account" description="Enter your email and password below to log in" />

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-6">
            @csrf
            <x-input id="email" label="{{ __('Email address') }}" type="email" name="email" required autofocus
                autocomplete="email" placeholder="email@example.com" :errors="$errors" />

            <div class="relative">
                <x-input id="password" label="{{ __('Password') }}" type="password" name="password" required
                    autocomplete="current-password" placeholder="Password" :errors="$errors" />

                @if (Route::has('password.request'))
                    <x-link class="absolute right-0 top-2 text-xs" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </x-link>
                @endif
            </div>

            <div class="text-xs text-base-content">
                <input type="checkbox" checked="checked" class="checkbox" />
                {{ __('Remember me') }}
            </div>

            <div class="flex items-center justify-end">
                <x-button variant="primary" type="submit" class="w-full">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </div>
</x-guest-layout>
