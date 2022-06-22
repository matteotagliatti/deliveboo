<header id="navbar" class="position-fixed fixed-top text-white">
    <nav :class="{ 'onScroll': !view.topOfPage}" class=" navbar navbar-expand-lg navbar-light  justify-content-between px-3 my-auto">

        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="my-logo-text text-success font-weight-bold" href="/">DeliveBoo</a>


        <div class="px-3">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li><a class="text-dark mr-3" href="/cerca">Cerca</a></li>
                    <li><a class="text-dark mr-3" href="#">Ristoranti</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="text-dark" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="text-dark" href="{{ route('login') }}">Login Ristorante</a></li>

                            @if (Route::has('register'))
                                <li><a class="text-dark" href="{{ route('register') }}">Registrati Ristorante</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>

    </div>
    </nav>



</header>



{{-- <div class="container d-flex justify-content-between align-items-center py-3">
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
    </div> --}}



