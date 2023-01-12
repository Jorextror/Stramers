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
</style>

<div class="lista_mazos">
    <a href="{{  route("new.mazo") }}"><img src="{{ asset('img/+.png') }}"></a>
    @isset($mazos)
        @foreach($mazos as $mazo)
            <x-mazo nombre="{{ $mazo->name }}"></x-mazo>
        @endforeach
    @endisset

</div>
@endsection
