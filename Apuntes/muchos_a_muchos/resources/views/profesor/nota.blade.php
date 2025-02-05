<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Poner nota a los alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('profesor.nota') }}">
                        @csrf
                        Alumno:
                        <select class="text-gray-900" name="alumno_id">
                            @foreach ($alumnos as $a)
                                <option class="text-gray-900" value="{{ $a->id }}">{{ $a->name }}
                                    {{ $a->surname }}</option>
                            @endforeach
                        </select><br>
                        Asignatura: <input class="text-gray-900" type="text" name="asignatura"><br>
                        Nota: <input class="text-gray-900" type="text" name="nota"><br>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
