<div class="container mx-auto mt-10">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Detalles de la Visita</h1>

        <div class="mb-4">
            <label class="font-semibold">Usuario:</label>
            <p class="text-gray-700">{{ $visitas->user->name }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Departamento:</label>
            <p class="text-gray-700">{{ $visitas->department->department_name }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Motivo de la Visita:</label>
            <p class="text-gray-700">{{ $visitas->visit_motive }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Estado:</label>
            <p class="text-gray-700">
                {{ $visitas->status ? 'Completado' : 'Pendiente' }}
            </p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Hora de visita:</label>
            <p class="text-gray-700">{{ $visitas->start_at }}</p>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Fecha de visita:</label>
            <p class="text-gray-700">{{ $visitas->visit_date }}</p>
        </div>
    </div>
</div>
