@extends ('layouts.app')

@section('content')

<form action="{{ route('admin.update') }}" method="POST">
    @csrf
    @method('PUT')
</form>

@endsection