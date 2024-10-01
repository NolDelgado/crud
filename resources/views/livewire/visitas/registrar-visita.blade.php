<div>
    <h1>Registrar Nueva Visita</h1>

    {{-- @if (session('success'))
        <div role="alert">
            {{ session('success') }}
        </div>
    @endif --}}

    <form wire:submit.prevent="registrarVisita" novalidate>
        @csrf

        <div>
            <label for="department">Departamento</label>
            <select id="department" wire:model="department">
                <option value="">Seleccione un departamento</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
            @error('department')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="visit_motive">Motivo de la Visita</label>
            <textarea id="visit_motive" wire:model="visit_motive">{{ old('visit_motive') }}</textarea>
            @error('visit_motive')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="visit_date">Día de la Visita</label>
            <input type="date" id="visit_date" wire:model="visit_date" value="{{ old('visit_date') }}">
            @error('visit_date')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="start_at">Hora de Entrada</label>
            <input type="time" id="start_at" wire:model="start_at" value="{{ old('start_at') }}" required>
            @error('start_at')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Registrar Visita</button>
        </div>
    </form>
    {{-- @forelse ($departments as $department)
        <div class="flex items-center justify-between p-4 bg-white dark:bg-gray-800 rounded-lg shadow-xs">
            <div class="flex items-center">
                <img class="h-12 w-12 rounded-full object-cover" src="{{ $department->logo }}" alt="{{ $department->name }}">
                <div class="ml-2">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ $department->name }}</p>
                    <p class="text-sm font-semibold text-gray-500 dark:text-gray-300">{{ $department->description }}</p>
                </div>
            </div>
            <button wire:click="selectDepartment({{ $department->id }})" class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 dark:bg-blue-600 rounded-lg focus:outline-none focus:shadow-outline">Seleccionar</button>
        </div>
    @empty
        <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">No hay departamentos registrados</p>
    @endforelse --}}
</div>
