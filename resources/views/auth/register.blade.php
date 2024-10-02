<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <!-- Formulario para crear usuario -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Selección del tipo de usuario -->
            <div>
                <x-label for="user_type" value="Tipo de usuario" />
                <select id="user_type" name="user_type" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" required>
                    <option value="student">Estudiante</option>
                    <option value="teacher">Maestro</option>
                    <option value="guest">Externo/Invitado</option> <!-- Nuevo tipo de usuario -->
                </select>
            </div>

            <!-- Nombre (visible para todos los usuarios) -->
            <div class="mt-4" id="name_field">
                <x-label for="name" value="Nombre completo" />
                <x-input id="name" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <!-- Correo electrónico (visible para todos los usuarios) -->
            <div id="email_field" class="mt-4">
                <x-label for="email" value="Correo electrónico" />
                <x-input id="email" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <!-- Teléfono (Solo visible para "Externo/Invitado") -->
            <div class="mt-4" id="phone_field">
                <x-label for="phone" value="Teléfono" />
                <x-input id="phone" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="text" name="phone" :value="old('phone')" />
            </div>

            <!-- Campos adicionales solo para estudiantes (carrera y semestre) -->
            <div id="student_fields" class="mt-4">
                <div class="mt-4">
                    <x-label for="career" value="Carrera" />
                    <select id="career" name="career" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300">
                        <option value="" disabled selected>Selecciona tu carrera</option>
                        <option value="Ingenieria de software">Ingeniería de Software</option>
                        <option value="Ingenieria en computacion">Ingeniería en Computación</option>
                        <option value="Ingenieria en plasticos">Ingeniería en Plásticos</option>
                        <option value="Ingenieria mecanica">Ingeniería Mecánica</option>
                        <option value="Licenciatura en seguridad ciudadana">Licenciatura en Seguridad Ciudadana</option>
                        <option value="Ingenieria en produccion industrial">Ingeniería en Producción Industrial</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="semester" value="Semestre" />
                    <x-input id="semester" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="text" name="semester" :value="old('semester')" />
                </div>
            </div>

            <!-- Número de cuenta (solo si no es "Externo/Invitado") -->
            <div class="mt-4" id="tuition_field">
                <x-label for="tuition" value="Número de cuenta" />
                <x-input id="tuition" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="text" name="tuition" :value="old('tuition')" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-label for="password" value="Contraseña" />
                <x-input id="password" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmar contraseña -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Confirmar contraseña" />
                <x-input id="password_confirmation" class="block mt-1 w-full dark:bg-gray-800 dark:text-gray-300" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2 dark:text-gray-300">
                                {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Términos de Servicio</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">Política de Privacidad</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>

                <x-button class="ms-4">
                    Registrarse
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userTypeSelect = document.getElementById('user_type');
        const studentFields = document.getElementById('student_fields');
        const emailField = document.getElementById('email_field');
        const tuitionField = document.getElementById('tuition_field');
        const phoneField = document.getElementById('phone_field');

        // Mostrar u ocultar los campos dependiendo del tipo de usuario
        function toggleFields() {
            if (userTypeSelect.value === 'teacher') {
                studentFields.style.display = 'none';
                emailField.style.display = 'block';
                tuitionField.style.display = 'block';
                phoneField.style.display = 'none';
            } else if (userTypeSelect.value === 'student') {
                studentFields.style.display = 'block';
                emailField.style.display = 'block';
                tuitionField.style.display = 'block';
                phoneField.style.display = 'none';
            } else if (userTypeSelect.value === 'guest') {
                studentFields.style.display = 'none';
                emailField.style.display = 'block';
                tuitionField.style.display = 'none';
                phoneField.style.display = 'block';
            }
        }

        userTypeSelect.addEventListener('change', toggleFields);

        // Inicializar los campos al cargar la página
        toggleFields();
    });
</script>
