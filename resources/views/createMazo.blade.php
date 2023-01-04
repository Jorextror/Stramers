@extends('layouts.app')

@section('content')

<style>
    button{
        background: none;
        border: 0;
        color: inherit;
    }
    .lateral{
        position: fixed;
        width: 16%;
        height: 90vh;
        right: 0;
        margin: 0;
        padding-top: 5px;
        font-size: 1em;
        text-align: center;
        border: solid 4px #a12dff;
        box-shadow: rgba(0, 0, 0, 0.582) 1px 0 10px;
    }
    input[type="text"] {
        border: none;
        background-color: transparent;
        text-align: center;
    }

    .color-white{
        color: rgb(0, 0, 0);
        height: 10px;
    }
    .comun{
    background: rgb(93, 93, 93);
    }
    .pocoComun{
        background: rgb(0, 132, 255);
    }
    .epica{
        background:rgb(174, 0, 255);
    }
    .legendaria{
        background: rgb(255, 166, 0);
    }
</style>

<div class="lateral ">
    <input type="text" id="name" value="Mazo Nuevo"> <span id="count">0</span> /15
    <ul id="lista" class="container-fluid list-group"></ul>
</div>

<div class="container">
    <div class="d-flex row m-1 justify-content-start">
        {{-- <a href="{{  route("home") }}"><x-boton></x-boton></a> --}}
        @foreach($cartas as $key => $value)
            <div class="col-3 m-2">
                <button onclick='addcard(@json($value))'>
                    <x-carta
                    imagen='/storage/{{ $value->img }}'
                    nombre='{{ $value->name }}'
                    categoria='{{ $value->category }}'
                    vida='{{ $value->life }}'
                    dmg='{{ $value->dmg }}'
                    coste='{{ $value->cost }}'></x-carta>
                </button>
            </div>
        @endforeach

    </div>
</div>

<script>
    var lista=[];
    var count=0;

  function addcard(carta){
    if (count<=14){
      lista.push(carta);
      count++;
      name=carta['name'];
      $('#count').text(count);
      $('#lista').append('<li onclick=delcard("'+name+'") id="'+ carta['name'] +'" class="list-group-item ms-3 p-2 '+carta['category'] +'">' +carta['name']+ '</li>');
    }
  }
  function delcard(name){
    count--;
    $('#count').text(count);
    $("li").remove('#'+name)
  }

</script>

@endsection
