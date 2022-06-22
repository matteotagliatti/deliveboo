<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.header')

    <div>
        @yield('content')
    </div>

    @include('partials.footer')
    @yield('script')
    <script src="https://kit.fontawesome.com/0548baee83.js" crossorigin="anonymous"></script>
</body>
