
<div class="img img_fondo_{{$categoria}}">
    <div class="fondo-nombre"></div>
    <img class="" src="{{ $imagen }}" alt="" srcset="">
    {{-- <img class="img_fondo_{{$categoria}}"src="{{ asset("img/$categoria.png") }}" alt=""> --}}
    <span id="nombre" class="nombre"> {{ $nombre }} </span>

        @if($vida >=10)
            <span id="vida" style='background-image: url("{{ asset('img/life.png') }}")' class="vida"><span class="text_vida_10">{{ $vida }}</span></span>
        @else
            <span id="vida" style='background-image: url("{{ asset('img/life.png') }}")' class="vida"><span class="text_vida">{{ $vida }}</span></span>
        @endif

        @if($dmg>=10)
            <span id="dmg" class="dmg" style='background-image: url("{{ asset('img/dmg.png') }}")'><span class="text_dmg_10">{{ $dmg }}</span></span>
        @else
            <span id="dmg" class="dmg" style='background-image: url("{{ asset('img/dmg.png') }}")'><span class="text_dmg">{{ $dmg }}</span></span>
        @endif

        <span id="coste" class="coste" >{{ $coste }}</span>
</div>
