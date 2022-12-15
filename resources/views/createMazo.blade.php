@extends('layouts.app')

@section('content')

<style>
    button{
        background: none;
        border: 0;
        color: inherit;
    }
    .lateral{
        float: right;
        width: 16%;
        height: 100vh;
        background: #181728;
        font-size: 1em;
        text-align: center;
        border: solid 1px;
        border-radius: 10px;
        position: sticky;
}
</style>
<div class="container">
    <div class="d-flex row lateral justify-content-end"></div>
    <div class="d-flex row m-1 justify-content-start">
        <a href="{{  route("home") }}"><x-boton></x-boton></a>
        @foreach($cartas as $key => $value)
            <div class="col-3 m-2">
                <button>
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

@endsection
