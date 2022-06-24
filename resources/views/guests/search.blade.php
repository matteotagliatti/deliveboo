@extends('layouts.front')

@section('title')
    Cerca
@endsection

@section('content')
    @include ('partials.search')
@endsection

@section('script')
    <script src="{{ asset('js/front-search.js') }}"></script>
@endsection
