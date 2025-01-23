<h1>Listado de Frutas</h1>

<ul>
    @foreach ($frutas as $f)
        <li>{{ $f }}</li>
    @endforeach
</ul>

<br>

@php
    $pais = 'Italia';
@endphp

<a href="{{ route('peras') }}">Ir a las peras</a>
<br>
<a href="{{ route('naranjas', ['pais' => 'Portugal']) }}">Ir a las naranjas</a>
<br>
<a href="{{ url('fruteria/naranjas/' . $pais) }}">Ir a las naranjas</a>

<h1>FORMULARIO DE REGISTRO DE FRUTAS</h1>
<form action="" method="POST">
    {{-- Esto genera un token de seguridad para que
    el propio servidor sepa que el formulario es seguro --}}
    @csrf
    <p>Nombre de la fruta: <input type="text" value="{{ old('nombre') }}" name="nombre"></p>
    <p>Descripción de la fruta:<br>
        <textarea name="descripcion" cols="30" rows="10">{{ old('descripcion') }}</textarea>
    </p>
    <p>País:<br>
        <input type="checkbox" name="pais[]" value="España">España
        <input type="checkbox" name="pais[]" value="Italia">Italia
        <input type="checkbox" name="pais[]" value="Francia">Francia
    </p>
    <input type="submit" name="save" value="Guardar Fruta">
</form>
