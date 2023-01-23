<x-app-layout>
    <form method="POST" action="{{route('imports.users.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="flex justify-center">
        <div class="mb-3 w-96">
            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Subir archivo de usuarios
                .XLSX
            </label>
            <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                          border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="users" name="users">
        </div>
    </div>

        <x-primary-button class="ml-3">
            {{ __('Subir') }}
        </x-primary-button>

    </form>
</x-app-layout>
