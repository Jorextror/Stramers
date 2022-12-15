<div class="img">
    <img class="img_fondo_{{$categoria}}" src="{{ $imagen }}" alt="" srcset="">
    {{-- <img class="img_fondo_{{$categoria}}"src="{{ asset("img/$categoria.png") }}" alt=""> --}}
    <span id="nombre" class="nombre">{{ $nombre }}</span>

        <span id="vida" class="vida">{{ $vida }}</span>

        <span id="dmg" class="dmg">{{ $dmg }}</span>

        <span id="coste" class="coste">{{ $coste }}</span>
</div>
