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
    <header class="position-fixed fixed-top">
        <div class="container d-flex justify-content-between align-items-center py-3">
            <h1 class="fw-bold">DeliveBoo</h1>
            <nav>
                <ul class="d-flex gap-3 list-unstyled">
                    <li>Cerca</li>
                    <li>Ristoranti</li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login Ristorante</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Registrati Ristorante</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>

    </header>

    <div class="content">
        @yield('content')
    </div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>
