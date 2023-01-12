{{-- <div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @else

            @endguest
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
                @guest
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
                @else

                <li class="nav-item text-muted bg-dark">
                    <div class="container navbar-nav ">
                        {{ Auth::user()->money }}
                    </div>
                </li>

                    <li class="nav-item dropdown bg-dark">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nick }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-dark text-light" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-muted" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
--}}

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
        <nav class="nav-top">

            <div class="info">
                {{ Auth::user()->nick }}
            </div>

            <span class="progress-bar-text">1</span>
            <div class="progress">
                <div class="progress-bar" style="width:75%;"></div>
            </div>


            <div class="info">
                {{ __('Money:') }} {{ Auth::user()->money }}
            </div>

        </nav>
    @endguest
</div>

@guest
@else
<div class="fixed-bottom">
    <nav class="nav-bot" id="nav-bot">
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
