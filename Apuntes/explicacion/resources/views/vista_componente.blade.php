<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Llamada a Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <!-- Llamada al componente -->
    {{--     <x-alert colortext="green" colorbg="purple" />
    <x-alert />
 --}}
    <?php
    $color = 'red';
    $tipo_alerta = 'alert';
    ?>
    <!--
        Todo lo que le pasemos dentro, se reflejará en el componente
        a través de la variable $slot.
     -->
    <x-alert :colortext="$color" class="text-yellow-400">
        <h1 class="flex items-center text-5xl font-extrabold dark:text-red">
            Este es el contenido del slot
        </h1>
        <x-slot name="texto">
            <p>Esto es un ejemplo de slot</p>
        </x-slot>
    </x-alert>

    {{-- Llamamos al componente anónimo --}}
    {{--
        <x-alert2 colortext="red" />
        <x-alert2 />
    --}}

    {{-- Todo lo que escribamos aquí, se reflejará en el $slot --}}
    <x-alert2 entrada1="Primero">
        TÍTULO DE LA ALERTA
    </x-alert2>

    {{-- Llamada al componente dinámico --}}
    <x-dynamic-component :component="$tipo_alerta">
        CUIDADO!!!
        <x-slot name="texto">
            <p>Esto es un componente dinámico</p>
        </x-slot>
    </x-dynamic-component>

</body>

</html>
