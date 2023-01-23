<x-app-layout>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Importar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Descripción
                        </th>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    <a href="{{route('reports.users')}}">
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Usuarios
                            </th>
                            <td>
                                Subir Usuarios
                            </td>
                            <td class="py-4 px-6">



                            </td>
                        </tr>
                    </a>
                    </tbody>
                </table>



            </div>


        </div>
    </div>
</x-app-layout>
