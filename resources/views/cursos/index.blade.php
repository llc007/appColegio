<x-app-layout>
    <div class="max-w-3xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">

            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Curso
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ver
                        </th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach($cursos as $curso)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$curso->nombre}}
                            </th>
                            <td>
                                <a href="{{route('cursos.show',[$curso])}}">MOSTRAR</a>
                            </td>
                    </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>



        </div>
    </div>
</x-app-layout>

