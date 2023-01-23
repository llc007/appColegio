<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ficha del estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="grid grid-row-2 row-gap-6">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" disabled required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="grid grid-row-2 row-gap-6">
                            <x-input-label for="rut" :value="__('Rut')" />
                            <x-text-input id="rut" name="rut" type="text" class="mt-1 block w-full" :value="old('rut', $user->rut.'-'.$user->dv )" disabled required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
