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
