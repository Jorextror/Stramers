@extends('layouts.app')

@section('content')
<style>

.position-absolute {
  position: absolute !important;
}
</style>
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
    {{-- <a href="#" onclick="RequestAmigo()">{{ __('Añadir amigo') }}</a> --}}
    <a href="#" onclick="RequestAmigo()"><img class="img-fluid position-absolute end-0 m-3" style="width:15%;fill:rgb(163, 163, 163); "src="{{ asset('img/user-plus-solid.svg') }}" alt="" srcset=""></a>
    <h1 class="">{{ __('Friends') }}</h1>
    <div class="container" style="margin-top:55px;">
        @foreach (Auth::user()->friends as $friend)
        <div class="alert alert-light" role="alert">
            <strong> {{ $friend->nick }} </strong>
            {{-- <span> {{  }}</span> --}}
        </div>
            {{-- <div class="" style="margin:5px;">
               <strong> {{ $friend->nick }} </strong>
            </div> --}}
        @endforeach
    </div>
</div>
{{-- POPUP ALERTAS --}}
<a id="alert_ico" class="alertes" onclick="getNotifications()">
    <img style="width: 30px" src="{{ asset('img/alerts.svg') }}">
    <span id="notis" class="position-absolute top-5 start-5 translate-middle badge rounded-pill bg-danger">

    <span class="visually-hidden">unread messages</span>
    </span>
</a>
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
    <div class="start" ><a>{{ __('Battle') }}</a></div>
</div>
@endsection
<script>

    var numNotis = 0;
    function eliminar(id) {
        $("."+id).remove()
        $.ajax({
                url: "{{ route('user.eliminar.notificacion') }}",
                type: 'POST',
                data: {
                    ' _token': '{{ csrf_token() }}',
                    'id':id
                },
                async: false,
                success: function(){
                numNotis--
                $("#notis").text(numNotis)

                },
                error: function(data){

                }
        })
    }
    function aceptar(nick) {
        $("#"+nick).remove()
        $.ajax({
                url: "{{ route('user.new.friend') }}",
                type: 'POST',
                data: {
                    ' _token': '{{ csrf_token() }}',
                    'nick':nick
                },
                async: false,
                success: function(){
                    console.log("ok")
                    numNotis--
                    $("#notis").text(numNotis)

                },
                error: function(data){
                    console.log(data)
                }
        })
    }
    // POPUP AMIGOS
    function openNav() {
        document.getElementById("sideNavigation").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
    function closeNav() {
        document.getElementById("sideNavigation").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
    function dateToAge(date) {
        const fechaEspecifica = new Date(date);

        // fecha de hoy
        const fechaHoy = new Date();

        // diferencia en milisegundos
        const diferenciaMilisegundos = fechaHoy - fechaEspecifica;

        // conversión a días
        const diferenciaMinutos = Math.floor(diferenciaMilisegundos / (1000 * 60));
        if (diferenciaMinutos < 60)
        {
            return diferenciaMinutos + " min";
        }else
        {
            return Math.floor(diferenciaMinutos / 60) + " h";
        }
        return Math.floor(diferenciaMinutos * 24) + " D";
    }
    function getNotifications()
    {
        $.ajax({
                url: "{{ route('user.notifications') }}",
                type: 'POST',
                data: {
                    ' _token': '{{ csrf_token() }}',
                },
                async: false,
                success: function(data) {
                    if (data) {
                        let list="";
                        for (const key in data) {
                            list += '<div id="'+data[key].data.SentBy+'" class="alert alert-secondary '+data[key].id+'">{{ __("Friend Request from") }} <strong>'+data[key].data.SentBy+'</strong> '+dateToAge(data[key].created_at)+'<button style="margin-top:-8px; margin-left:10px"  onclick=aceptar("'+data[key].data.SentBy+'") class="btn btn-success float-end" >&#x2713;</button> <button style="margin-top:-8px; margin-left:10px" onclick=eliminar("'+data[key].id+'") class="btn btn-danger float-end">&times;</button></div>'
                        }
                        Swal.fire({
                                    toast:true,
                                    position: 'top',
                                    width: 600,
                                    // padding:'5px',
                                    showConfirmButton: false,
                                    showCloseButton:true,
                                    title: "Notifications",
                                    html: list,
                                    // background: '#111',
                                    customClass: {
                                                    container: 'position-absolute'
                                                },
                                   })
                    }
                },
                error: function(error) {
                    console.log(error)
                    if (error) {
                        Swal.fire('{{ __("Error on get the notifications") }}', '', 'error')
                    }
                }

                })
    }
    function RequestAmigo()
    {
        Swal.fire({
            title: "{{ __('Add Friend') }}",
            input: 'text',
            inputAttributes: {
            autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText:"{{ __('Send')}}",
            preConfirm: (nick) =>{
                return $.ajax({
                                url: "{{ route('user.request.friend') }}",
                                type: 'POST',
                                data: {
                                   ' _token': '{{ csrf_token() }}',
                                    'nick': nick,
                                    'user_name': '{{ Auth::user()->nick }}',
                                    'user_id': '{{ Auth::user()->id }}'
                                },
                                async: false,
                                success: function(data) {
                                   const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            showConfirmButton: false,
                                                            timer: 3000,
                                                            timerProgressBar: true,
                                                            didOpen: (toast) => {
                                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                        }
                                                            })
                                    if (data) {
                                        Toast.fire({
                                                    icon: 'success',
                                                    title: '{{ __("Friend request send") }}'
                                                })
                                    }else{
                                        Toast.fire({
                                                    icon: 'error',
                                                    title: '{{ __("Error on send friend request") }}'
                                                })
                                    }
                                },
                                error: function(error) {
                                    console.log(error)
                                    if (error) {
                                        Swal.fire('{{ __("Error on send friend request") }}', '', 'error')
                                    }
                                }

                            })
            }

        })

    }

    setInterval(() => {
        console.log("ola")
        $.ajax({
                url: "{{ route('user.notifications') }}",
                type: 'POST',
                data: {
                    ' _token': '{{ csrf_token() }}',
                },
                success: function(data){
                    $("#notis").text(Object.keys(data).length)
                    numNotis = Object.keys(data).length;
                },
                error: function(data){
                }
            })
    }, 5000);
</script>
