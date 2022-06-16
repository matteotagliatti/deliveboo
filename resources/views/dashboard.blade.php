@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>{{ $user->nome }}</h1>

                        <a href="/dishes" class="btn btn-primary">Piatti</a>
                        <a href="/orders" class="btn btn-secondary">Ordini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
