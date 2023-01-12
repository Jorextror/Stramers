@extends('layouts.app')

@section('content')

<style>
.lista_sobres{
    width: 100%;
    /* display: flex; */
    padding: 0.5rem 5px;
    flex-flow:row wrap;
}
</style>

<div class="lista_sobres">
    <a href="{{  route("home") }}"><x-boton></x-boton></a>
    <x-sobres></x-sobres>
</div>
@endsection
