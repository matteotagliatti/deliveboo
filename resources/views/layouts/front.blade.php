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

    <footer class="position-relative">
        <div class="container py-5">
            <div class="custom-shape-divider-top-1655825834">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25" class="shape-fill"></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5" class="shape-fill"></path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="row mt-5rem">
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li>
                            <h3>Link</h3>
                        </li>
                        <li><a href="#">Cerca</a></li>
                        <li><a href="#">Ristoranti</a></li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li>
                            <h3>Contatti</h3>
                        </li>
                        <li>email@email.com</li>
                    </ul>
                </div>
                <div class="col-4">
                    <ul class="list-unstyled">
                        <li>
                            <h3>Restiamo in contatto</h3>
                        </li>
                        <li>
                            <input type="email" name="email" id="email">
                            <input type="submit" value="Invia">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="https://kit.fontawesome.com/0548baee83.js" crossorigin="anonymous"></script>
</body>
