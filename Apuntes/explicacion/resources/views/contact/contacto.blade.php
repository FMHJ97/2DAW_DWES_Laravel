<h1>Hola, soy el contacto de {{ $name }} y tengo {{ $edad }} años</h1>

<!-- Incluimos el archivo cabecera.blade.php -->
@include('cabecera')

<!-- Condicional if -->
@if($edad > 18)
    <p>Ya eres mayor de edad</p>
@else
    <p>Eres menor de edad</p>
@endif

<!-- Bucle que recorre array -->
<ul>
    @foreach($frutas as $fruta)
        <li>{{ $fruta }}</li>
    @endforeach
</ul>
