<div>
    @guest
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav bg-dark ms-auto">
                    <!-- Authentication Links -->
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    @else
        <nav id="nav-bar" class="nav-top">
            <div>
                <img class="img_profile" src="/storage/{{ Auth::user()->avatar }}" alt="" srcset="">
            </div>
            <div class="info nick">
                {{ Auth::user()->nick }}
            </div>

            <span id="lvl" class="progress-bar-text float-right">1</span>
            <div class="progress">
                <div class="progress-bar" style="width:15%; background-color:#9bfd71;"></div>
            </div>
        </nav>
        <div class="money_profile">
            <img class="money" src="{{ asset('img/money.png') }}" alt="" srcset=""> <span class="money-text">{{ Auth::user()->money }}</span>
        </div>
        <div class="fixed-bottom">
            <nav class="nav-bot background-colours" id="nav-bot">
                <a class="navbar-brand {{ Request::is('mazo') ? 'active' : '' }}" href="{{ url('/mazo') }}">
                    {{ __('Decks') }} <img style="width: 30px" src="{{ asset('img/cartas.png') }}" alt="">
                </a>
                <a class="navbar-brand {{ Request::is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                    {{ __('Batalla') }} <img style="width: 30px" src="{{ asset('img/casa.png') }}" alt="">
                </a>
                <a class="navbar-brand {{ Request::is('tienda') ? 'active' : '' }}" href="{{ url('/tienda') }}">
                    {{ __('Shop') }} <img style="width: 30px" src="{{ asset('img/bolsadinero.png') }}" alt="">
                </a>
            </nav>
        </div>
    @endguest
</div>
