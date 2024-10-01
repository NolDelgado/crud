<div class="w-64 h-screen bg-white dark:bg-gray-800 shadow-md">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Menú</h2>
        <ul class="mt-4">
            <li class="mb-2">
                <a href="{{ route('dashboard') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                    Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('visits.index') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                    Mis visitas
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('visits.create') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                    Registrar nueva visita
                </a>
            </li>
            <!-- Agrega más enlaces según sea necesario -->
        </ul>
    </div>
</div>
