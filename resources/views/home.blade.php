@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <div class="container">
                        <x-carta imagen='http://stramers.test/storage/{{ $carta->img }}' nombre='{{ $carta->name }}' categoria='{{ $carta->category }}' vida='{{ $carta->life }}' dmg='{{ $carta->dmg }}' coste='{{ $carta->cost }}'></x-carta>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
