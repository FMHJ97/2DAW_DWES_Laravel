<div class="p-4 mb-4 text-sm text-red-800 rounded-lg
 bg-red-50 dark:bg-{{ $colorbg }}-800 dark:text-{{ $colortext }}-400"
    role="alert">
    <span class="font-medium">{{ $slot }}</span>
    {{ $texto }}

    <p {{ $attributes }}>Creado por FMHJ</p>

    {{-- Llamada a un método de la clase --}}
    {{ $peligro() }}
</div>
