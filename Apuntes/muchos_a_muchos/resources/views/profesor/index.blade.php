<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Mis alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($alumnos as $a)
                        Nombre: {{ $a->name }}<br>
                        Apellidos: {{ $a->surname }}<br>
                        Email: {{ $a->email }}<br>
                        Curso: {{ $a->curso }}<br>
                        Asignatura: {{ $a->pivot->asignatura }}<br>
                        Nota: {{ $a->pivot->nota }}<br>
                        =====================================<br>
                    @endforeach
                    {{ $alumnos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
