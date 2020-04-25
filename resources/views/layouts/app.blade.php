<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Shop4Me') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <div id="app"> --}}
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
    </div>
    </nav> --}}

    <nav class="navbar navbar-expand-md py-3 fixed-top navbar-light border-bottom mb-4 mb-md-5 w-100 fixed-navbar"
        style="box-shadow: 0px 0px 15px #d9d9d9, -4px -4px 5px #fafafa;">
        <div class="container">
            <a class="navbar-brand brand_logo" href="/">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <form class="form-inline">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-default" type="submit">Search</button>
                    </form>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item @if (Request::is('/')) active @endif">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    <li class="nav-item @if (Request::is('cart')) active @endif">

                        <a class="nav-link" href="/cart">
                            <span style="position: relative; left: 2px;">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px"
                                    height="20px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M509.867,89.6c-2.133-2.133-4.267-4.267-8.533-4.267H96L85.333,29.867c0-4.267-6.4-8.533-10.667-8.533h-64
                C4.267,21.333,0,25.6,0,32c0,6.4,4.267,10.667,10.667,10.667h55.467l51.2,260.267c6.4,34.133,38.4,59.733,72.533,59.733H435.2
                c6.4,0,10.667-4.267,10.667-10.667c0-6.4-4.267-10.667-10.667-10.667H192c-17.067,0-34.133-8.533-42.667-23.467L460.8,275.2
                c4.267,0,8.533-4.267,8.533-8.533L512,96C512,96,512,91.733,509.867,89.6z M450.133,256l-311.467,40.533l-38.4-192H486.4
                L450.133,256z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M181.333,384C151.467,384,128,407.467,128,437.333c0,29.867,23.467,53.333,53.333,53.333
                c29.867,0,53.333-23.467,53.333-53.333C234.667,407.467,211.2,384,181.333,384z M181.333,469.333c-17.067,0-32-14.934-32-32
                s14.933-32,32-32c17.067,0,32,14.934,32,32S198.4,469.333,181.333,469.333z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M394.667,384c-29.867,0-53.333,23.467-53.333,53.333c0,29.867,23.467,53.333,53.333,53.333
                c29.867,0,53.333-23.467,53.333-53.333C448,407.467,424.533,384,394.667,384z M394.667,469.333c-17.067,0-32-14.934-32-32
                s14.933-32,32-32c17.067,0,32,14.934,32,32S411.733,469.333,394.667,469.333z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                                @if (Auth::user())
                                <span class="badge text-white"
                                    style="background-color: #af0000;position: relative; top: -10px; right: 16px; border-radius: 8px;">{{ count($cart_contents2) ?? 0 }}</span>
                            </span>
                            @else
                            <span class="badge text-white"
                                style="background-color: #af0000;position: relative; top: -10px; right: 16px; border-radius: 8px;">0</span>
                            </span>
                            @endif
                            <span style="position: relative; left: -12px;">Cart</span>
                        </a>
                    </li>
                    <li class="nav-item @if (Request::is('login')) active @endif">
                        @if (Auth::user())
                        <a class="nav-link" href="/account">{{ Auth::user()->name }}</a>
                        @else
                        <a class="nav-link" href="/login">Login</a>
                        @endif
                    </li>
                    @if (!Auth::user())
                    <li class="nav-item @if (Request::is('register')) active @endif">
                        <a class="nav-link" href="/register">Create account</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-2">
        @yield('content')
    </main>

    <footer class="mt-5">
        @include('includes.footer')
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="/js/custom.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>