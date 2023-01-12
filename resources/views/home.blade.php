@extends('layouts.app')

@section('content')

{{-- dropdown SETTINGS --}}
<a class="settings" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <img style="width: 30px" src="{{ asset('img/settings.svg') }}">
</a>
<div class="dropdown-menu dropdown-menu-end bg-dark text-light" aria-labelledby="navbarDropdown">
    <a class="dropdown-item text-muted" href="#">
        {{ __('Settings') }}
    </a>
    <a class="dropdown-item text-muted" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
{{-- POPUP AMIGOS --}}
<a href="#" onclick="openNav()" class="amigos" >
    <img style="width: 30px" src="{{ asset('img/amigos.svg') }}">
</a>
{{-- POPUP OCULTO DE AMIGOS --}}
<div id="sideNavigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">{{ __('Amigos') }}</a>
    <a href="#">{{ __('Añadir amigo') }}</a>
</div>
{{-- POPUP ALERTAS --}}
<a id="alerts" class="alertes" >
    <img style="width: 30px" src="{{ asset('img/alerts.svg') }}">
</a>
{{-- popup oculto alertas --}}
<!-- The Modal -->
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Some text in the Noticias..</p>
    </div>
</div>

{{-- box elegir mazo --}}
<div class="mazos-elegir">
    <div class="llista_mazos">
        @isset($mazos)
            @foreach($mazos as $mazo)
                <x-mazo nombre="{{ $mazo->name }}"></x-mazo>
            @endforeach
        @endisset
    </div>

</div>
{{-- box empezar partida --}}
<div class="start-box">
    <div class="mazo_select"></div>
    <div class="start" ><a>{{ __('Batalla') }}</a></div>
</div>
@endsection

<script>
    // POPUP AMIGOS
    function openNav() {
        document.getElementById("sideNavigation").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
    function closeNav() {
        document.getElementById("sideNavigation").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
