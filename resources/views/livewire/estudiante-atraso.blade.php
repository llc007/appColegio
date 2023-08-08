<div class="w-full p-4 sm:p-6 lg:p-8">

{{--MENSAJE DE EXITO, se maneja con el Session, dura 5 segundos --}}
    @if(Session::has('message'))
        <div x-data="{ mensaje5seg: @entangle('mensaje5seg').defer }"
             x-show="mensaje5seg"
             x-init="mensaje5seg = true;
            setTimeout(() => { mensaje5seg = false; }, 3000);"
             id="alert-border-3"
             class="mb-4 z-10 flex border-t-4 border-green-300 bg-green-50 p-2 text-green-800 dark:border-green-800 dark:bg-gray-800 dark:text-green-400"
             role="alert">
            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 z-10 text-sm font-medium block">
                {{session('message')}}
            </div>
        </div>
    @endif

    {{--TITULO--}}
    <div class="container mx-auto">
        <div class="mb-4 text-center text-xl">Buscar estudiante</div>
        <label for="default-search"
               class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>

        <div class="w-full md:flex">

            <div class="mb-3 w-full md:w-9/12">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                           wire:model="busqueda"
                           wire:input="buscar"
                           {{--wire:loading.remove
                           wire:target="search"--}}
                           class="block w-full rounded-lg border border-gray-300 dark:focus:border-blue-500 bg-gray-50 p-4 pl-10 text-sm text-gray-900 dark:focus:ring-blue-500 focus:border-blue-500 focus:ring-blue-500 dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                           placeholder="Ingrese o escanee el Rut">
                    <button
                        class="absolute rounded-lg bg-blue-700 dark:hover:bg-blue-700 px-4 py-2 text-sm font-medium text-white dark:focus:ring-blue-800 right-2.5 bottom-2.5 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600"
                    >Buscar
                    </button>
                </div>
            </div>


            {{--RELOJ--}}
            <div class="w-full md:w-3/12">
                <div x-data="{ time: '{{ now() }}' }"
                     x-init="setInterval(() => { time = new Date().toLocaleTimeString() }, 1000)">
                    <div class="mx-auto rounded-lg border bg-gray-50 py-3 pt-4 text-center md:w-3/4">
                        <span x-text="time"></span>
                    </div>
                </div>
            </div>

        </div>


    </div>


    <div wire:loading wire:target="search">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    @if($datos==null || count($datos)==0)
        <div class="container mx-auto p-5 md:my-5">
            <div class="rounded-lg border bg-gray-50 p-3 no-wrap md:-mx-2 md:flex md:justify-center">
                <div class="text-center text-xl font-bold">INSPECTORIA NHHS</div>
            </div>
        </div>
    @else
        <div class="animate__animated animate__fadeIn mx-auto md:my-5">
            <div class="no-wrap md:-mx-2 md:flex">
                <!-- Left Side -->
                <div class="w-full md:mx-2 md:w-2/12">
                    <!-- Profile Card -->
                    <div class="border-t-4 border-b-4 border-blue-300 bg-white p-3">
                        <div class="overflow-hidden image">
                            <img class="mx-auto h-auto w-full"
                                 src="https://cdn-icons-png.flaticon.com/512/1077/1077114.png"
                                 alt="">
                        </div>
                    </div>
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12">
                    <!-- Atraso Section -->
                    <div class="rounded-sm bg-gray-50 p-3 shadow-sm">
                        <div class="text-gray-700">
                            <div class="grid text-base md:grid-cols-1">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nombre</div>
                                    <div class="px-4 py-2">{{$datos[0]->nombrecompleto}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Curso</div>
                                    <div class="px-4 py-2">{{$datos[0]->curso->nombre}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Profesor Jefe</div>
                                    <div class="px-4 py-2">Leonel Huanca</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contacto apoderado</div>
                                    <div class="px-4 py-2">+569 90398456</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Atrasos del mes</div>
                                    <div class="px-4 py-2">8</div>
                                </div>

                        </div>

                        {{--DIV ATRASO--}}
                        <form wire:submit.prevent="createAtraso">
                            <div
                                class="mx-auto mt-14 rounded-sm border border-gray-300 bg-gray-50 pt-4 shadow-sm md:w-1/2">
                                <div class="text-center text-gray-700">
                                    <div class="grid text-base md:grid-cols-1">
                                        <div class="grid grid-cols-2">
                                            {{--CHeckbox justificar--}}
                                            <div class="px-4 py-2 font-semibold">Justificativo</div>
                                            <div class="px-4 py-2">
                                                <input type="checkbox"
                                                       wire:model="justifica"
                                                       class="form-checkbox h-5 w-5 text-blue-600">
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Hora de llegada</div>
                                            {{--<div class="px-4 py-2">{{now()->format('G:i:s')}}</div>--}}
                                            <div class="px-4 py-2">{{$horaDeLlegada->format('G:i:s')}}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Hora de entrada</div>
                                            <div>
                                                <select wire:model="selectedOption"
                                                        id="horas"
                                                        class="rounded-lg border border-gray-300
                                                        dark:focus:border-blue-500 bg-gray-50 text-sm text-gray-900
                                                        dark:focus:ring-blue-500 focus:border-blue-500 focus:ring-blue-500
                                                        dark:placeholder-gray-400 dark:border-gray-600 dark:bg-gray-700
                                                        dark:text-white">
                                                    @foreach($entradas as $e)
                                                        <option
                                                            @if($e->ultimousosn) selected @endif
                                                        value={{$e->hora}}>{{$e->hora}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{--<div x-data="{ selectedOption: @entangle('selectedOption') }">
                                                <p>El valor seleccionado es: <span x-text="selectedOption"></span></p>
                                            </div>--}}

                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Minutos de atraso</div>
                                            <div class="px-4 py-2"><span>{{$diferencia}} Minutos</span></div>
                                        </div>
                                    </div>
                                </div>
                                {{--BOTON REGISTRAR ATRASO--}}
                                <div class="my-4 flex justify-center bg-gray-50">
                                    <button
                                        type="submit"
                                        class="text-white bg-purple-700 rounded-lg text-sm px-4 py-2
                                    hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                                    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        REGISTRAR ATRASO
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{--FIN DIV ATRASO--}}
                    </div>
                    <!-- End of about section -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>

    @endif


    {{--    <div
            class="container mx-auto mt-7 max-w-7xl border border-gray-200 bg-gray-50"
        >
            <div class="px-3 py-4 text-center">
                @if($datos == null)
                    <p>no hay datos</p>
                @else
                    <p>{{$datos}}</p>
                @endif
            </div>

        </div>--}}


</div>
