<style>
    #coste{
        background-image: "{{ asset('img/etereo.png') }}"
        /* background-image: white; */
    }
</style>
<div class="img img_fondo_{{$categoria}}">
    <img class="" src="{{ $imagen }}" alt="" srcset="">
    {{-- <img class="img_fondo_{{$categoria}}"src="{{ asset("img/$categoria.png") }}" alt=""> --}}
    <span id="nombre" class="nombre">{{ $nombre }}</span>

        <span id="vida" style='background-image: url("{{ asset('img/life.png') }}")' class="vida"><span class="text_vida">{{ $vida }}</span></span>

        <span id="dmg" class="dmg">{{ $dmg }}</span>

        <span id="coste" class="coste" style='background-image: url("{{ asset('img/etereum.png') }}")'>{{ $coste }}</span>
</div>
