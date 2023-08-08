<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atrasos') }}
        </h2>
    </x-slot>

    <div>
        <livewire:estudiante-atraso></livewire:estudiante-atraso>

        <hr>


        <div class="text-center text-xl mt-7">Ultimos atrasos</div>
        <livewire:ultimos-atrasos></livewire:ultimos-atrasos>
    </div>



    {{--    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
            <h2>Datos atraso</h2>
            <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>

            <div x-data="{ count: 0 }">
                <x-primary-button x-on:click="count++">Increment</x-primary-button>

                <span x-text="count"></span>
            </div>

        </div>

        <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
            <h3>Ultimos atrasos</h3>
        </div>--}}


</x-app-layout>
