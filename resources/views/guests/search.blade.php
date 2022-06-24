@extends('layouts.front')

@section('title')
    Cerca
@endsection

@section('content')
    <div>
        <div id="hero" class="position-relative bg-dark">
            <div id="text-hero" class="text-center my-py-13 text-white position-absolute">
                <h1>Cerca</h1>
                <form action="{{ route('search.update') }}" method="post">
                    @csrf

                    <select name="types" id="types">
                        <option>-- Scegli la tipologia --</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->nome }}">{{ $type->nome }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Cerca">
                </form>

            </div>
        </div>
        @dump($users)
        @dump($choosenType)

        @foreach ($users as $user)
            @dump($user->pivot)
        @endforeach

@endsection

@section('script')
    <script src="{{ asset('js/front-search.js') }}"></script>
@endsection
