@foreach ($frutas as $fruta)
    <p>Nombre de la frutas: {{ $fruta->nombre }}</p>
    <p>Temporada: {{ $fruta->temporada }}</p>
    <p>País: {{ $fruta->pais }}</p>
    ========================================
@endforeach
