<header class="position-fixed fixed-top text-white">
    <div class="container d-flex justify-content-between align-items-center py-3">
        <a class="my-logo-text text-white font-weight-bold" href="/">DeliveBoo</a>
        <nav>
            <ul class="d-flex gap-2 list-unstyled">
                <li><a class="text-white" href="/cerca">Cerca</a></li>
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
