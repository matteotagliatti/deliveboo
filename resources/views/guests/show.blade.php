@extends ('layouts.front')

@section('title')
    {{ $user->nome }}
@endsection

@section('content')
    <div id="root">

    </div>
@endsection

@section('script')
    <script src="{{ asset('js/front-show.js') }}"></script>
@endsection
