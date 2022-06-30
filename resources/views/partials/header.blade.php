<header id="navbar" class="position-fixed fixed-top text-dark">
    <nav :class="{ 'onScroll': !view.topOfPage }"
        class=" navbar navbar-expand-lg navbar-light justify-content-between align-items-center my-auto">

        <div class="container my-column-flex">

            <a id="logo" class="my-logo-text text-white font-weight-bold" href="/">DeliveBoo</a>

            <div class="px-3">
                <ul>
                    <li><a class="text-white mr-3" href="/cerca">Cerca</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="text-white" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        @else
                            <li><a class="text-white" href="{{ route('login') }}">Login</a></li>

                            @if (Route::has('register'))
                                <li><a class="text-white ml-3" href="{{ route('register') }}">Registrati</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>

        </div>
    </nav>



</header>
