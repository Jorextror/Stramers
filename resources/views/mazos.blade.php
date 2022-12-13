@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{  route("home") }}"><x-boton></x-boton></a>
    <a href="{{  route("new.mazo") }}"><img style="width: 15%" src="{{ asset('img/more.png') }}"></a>
    @isset($mazos)
        @foreach($mazos as $mazo)
            <x-mazo nombre="{{ $mazo->name }}"></x-mazo>
        @endforeach
    @endisset

</div>
@endsection
