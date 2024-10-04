<div class="text-center">
    Aquí puedes ver y gestionar las visitas.
    <hr>
    <!-- Datos provisionales -->

    @if ($visitas->isEmpty())
        <div class="p-6 text-center">
            <p class="text-gray-600 dark:text-gray-400">No tienes visitas programadas.</p>>
        @else
            @foreach ($visitas as $visita)
                <div class="p-6 flex justify-between items-center">
                    <div class="flex flex-col">
                        <span class="font-medium text-gray-900 dark:text-white">Visita a:
                            {{ $visita->department->department_name }}</span>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Fecha: {{ $visita->visit_date }}</span>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Hora:
                            {{ $visita->start_at }}</span>
                    </div>

                    <div class="flex space-x-4 items-center">
                        <a href="{{ route('visits.show', ['id' => $visita->id]) }}"
                            class="text-blue-600 hover:text-blue-500 dark:text-blue-400">
                            Ver Detalles
                        </a>

                        <a href="{{ route('visits.edit', ['id' => $visita->id]) }}"
                            class="text-yellow-600 hover:text-yellow-500 dark:text-yellow-400">
                            Editar
                        </a>

                        <button class="text-red-600 hover:text-red-500 dark:text-red-400" wire:click='mostrarModal'>
                            Eliminar
                        </button>
                    </div>
                </div>
                @if ($esVisible)
                    <livewire:modal-eliminar :visita="$visita" />
                @endif
            @endforeach
    @endif
</div>
