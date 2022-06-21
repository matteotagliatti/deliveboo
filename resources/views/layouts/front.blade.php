<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - DeliveBoo</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <header class="position-fixed fixed-top text-white">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <a class="my-logo-text text-white font-weight-bold" href="/">DeliveBoo</a>
            <nav>
                <ul class="d-flex gap-2 list-unstyled">
                    <li><a class="text-white" href="#">Cerca</a></li>
                    <li><a class="text-white" href="#">Ristoranti</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="text-white" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="text-white" href="{{ route('login') }}">Login Ristorante</a></li>

                            @if (Route::has('register'))
                                <li><a class="text-white" href="{{ route('register') }}">Registrati Ristorante</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>

    </header>

    <div>
        @yield('content')
    </div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
