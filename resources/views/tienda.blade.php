@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{  route("home") }}"><x-boton></x-boton></a>
    <x-sobres></x-sobres>
</div>
@endsection
