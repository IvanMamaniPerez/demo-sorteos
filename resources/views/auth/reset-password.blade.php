<x-guest-layout>
    <x-js-authentication-card>
        <x-slot name="logo">
            <x-js-authentication-card-logo />
        </x-slot>

        <x-js-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-js-label for="email" value="{{ __('Email') }}" />
                <x-js-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-js-label for="password" value="{{ __('Password') }}" />
                <x-js-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-js-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-js-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-js-button>
                    {{ __('Reset Password') }}
                </x-js-button>
            </div>
        </form>
    </x-js-authentication-card>
</x-guest-layout>
