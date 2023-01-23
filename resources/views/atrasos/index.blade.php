<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atrasos') }}
        </h2>
    </x-slot>


    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="text-xl mb-2">Ingresar atraso</div>

{{--        Input de busqueda--}}

        <form>
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingrese o escanee el Rut" required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
            </div>
        </form>


    </div>

    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
        <h2>Datos atraso</h2>
        <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>

        <div x-data="{ count: 0 }">
            <x-primary-button x-on:click="count++">Increment</x-primary-button>

            <span x-text="count"></span>
        </div>

    </div>

    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
        <h3>Ultimos atrasos</h3>
    </div>


</x-app-layout>
