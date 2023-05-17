@extends('layouts.app')

@section('content')

<style>
    .lista_mazos{
        display: flex;
        padding: 0.5rem 5px;
        flex-flow:row wrap;
        /* justify-content: space-around; */
    }
    .lista_mazos img{
        margin: 5px 5px;
    }
    .btn-mazo{
        display: none;
        right: 75px;
        top: -20px;
        position:relative;
        width: 3%;
        height: 2%;
    }
    .eliminar{
        background-color: rgb(172, 172, 172);
    }
    .invisible{
        display: none
    }
    .visible{
        display:inline-block
    }

    .vibrate-1 {
	animation: vibrate-1 0.3s linear infinite both;
    }

    @keyframes vibrate-1 {
  0% {
    transform: translate(0);
  }
  20% {
    transform: translate(-2px, 2px);
  }
  40% {
    transform: translate(-2px, -2px);
  }
  60% {
    transform: translate(2px, 2px);
  }
  80% {
    transform: translate(2px, -2px);
  }
  100% {
    transform: translate(0);
  }
}


</style>
<div class="d-flex justify-content-center">
    <button id="eliminar" class="btn" onclick="init_eliminar()"><img src="{{ asset('img/basura.png') }}" alt="" srcset=""></button>
</div>

<div class="lista_mazos">
    <a href="{{  route("new.mazo") }}"><img src="{{ asset('img/+.png') }}"></a>
    @isset($mazos)
        @foreach($mazos as $mazo)
            <a class="mazos {{ $mazo->id }}" href="{{ route('mazo.update.index',$mazo->id) }}"><x-mazo nombre="{{ $mazo->name }}"></x-mazo></a>
            <button id="invisible" class="btn btn-mazo invisible {{ $mazo->id }}" onclick="eliminar({{ $mazo->id }})"><img src="{{ asset('img/eliminar.png') }}" alt="" srcset=""></button>
        @endforeach
    @endisset
</div>

<script>
    function init_eliminar() {
        $('#invisible').toggleClass('invisible')
        $('.btn-mazo').toggleClass('visible')
        $('.mazos').toggleClass('vibrate-1')
        $('#eliminar').toggleClass('eliminar')
    }

    function eliminar(id)
    {
        $.ajax({
            url: '{{ route("mazo.remove") }}',
            type: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id
            },
            success: function(data) {
                $('.'+id).addClass('invisible')
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
@endsection
