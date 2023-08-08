<form method="POST" action="{{route('atrasos.destroy',$row)}}">
    @csrf
    @method('delete')
    <div class="">

        <!-- Boton borrar solo si tiene permisos -->
        @can('eliminar atraso')
        <button class="px-4 py-2 bg-indigo-50 font-semibold border border-b text-sm text-red-500 rounded-full shadow-sm" :href="route('atrasos.destroy',$row)" onclick="event.preventDefault(); this.closest('form').submit();">
            {{__('Borrar')}}
        </button>
        @endcan

    </div>

</form>
