<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel - @yield('title')</title>
</head>
<body>
    <!-- Cabecera -->
    @section('header')
        @include('cabecera')
    @show
    <!-- Contenido -->
    <div>
        @yield('content')
    </div>
    <!-- Footer -->
    @section('footer')
        FOOTER DE LA PLANTILLA MAESTRA
    @show
</body>
</html>
