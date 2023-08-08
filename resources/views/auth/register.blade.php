<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Apellidos paterno y materno -->
            <div class="mt-4 grid grid-cols-2 gap-2">
                <div class="">
                    <x-input-label for="paterno" :value="__('Apellido Paterno')" />
                    <x-text-input id="paterno" class="block mt-1 w-full" type="text" name="paterno" :value="old('paterno')" required autofocus />
                    <x-input-error :messages="$errors->get('paterno')" class="mt-2" />
                </div>

                <div class="">
                    <x-input-label for="materno" :value="__('Apellido Materno')" />
                    <x-text-input id="materno" class="block mt-1 w-full" type="text" name="materno" :value="old('materno')" required autofocus />
                    <x-input-error :messages="$errors->get('materno')" class="mt-2" />
                </div>
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Rut + DV-->
            <div class="mt-4 grid grid-flow-col auto-cols-max gap-2">
                <div class="">
                    <x-input-label for="rut" :value="__('Rut')" />
                    <x-text-input id="rut" class="block mt-1 w-full" type="text" name="rut" :value="old('rut')" required autofocus />
                    <x-input-error :messages="$errors->get('rut')" class="mt-2" />
                </div>

                {{--GUION centrado verticalmente--}}
                <div class="flex items-center justify-center text-center">
                    <span class="text-gray-500 text-center mt-4">-</span>
                </div>


                <div class="w-11">
                    <x-input-label for="dv" :value="__('DV')" />
                    <x-text-input id="dv" class="block mt-1 w-full" type="text" name="dv" :value="old('dv')" required autofocus />
                    <x-input-error :messages="$errors->get('dv')" class="mt-2" />
                </div>

            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
