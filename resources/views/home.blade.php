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
                        <x-carta imagen='https://sites.google.com/site/alvaroinformaticalosolivos/_/rsrc/1399533891139/home/mister-jagger/mister%20jagger.jpg?height=200&width=200' nombre='Mister Jagger' categoria='legendaria' vida='10' dmg='10' coste='10'></x-carta>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
