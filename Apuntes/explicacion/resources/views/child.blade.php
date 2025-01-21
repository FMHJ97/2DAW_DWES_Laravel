@extends('layouts.master')

<!-- Para rellenar el yield de la plantilla maestra -->
@section('title', 'Prueba')

<!-- Para definir el contenido de la sección 'content' -->
@section('content')
    Aquí irá el contenido de la vista hija.
@endsection

<!-- Para rellenar el @section('footer') de la plantilla maestra -->
@section('footer')
    <!-- Si queremos mostrar el footer de la plantilla maestra -->
    @parent
    <br>FOOTER DE LA VISTA HIJA
@endsection
