@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Il tuo ristorante') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (str_starts_with($user->immagine, 'https://') || str_starts_with($user->immagine, 'http://'))
                            <img src="{{$user->immagine}}" class="img-fluid rounded-start mb-2" alt="{{ $user->nome }}">
                        @else
                            <img src="{{asset('storage/' . $user->immagine)}}" class="img-fluid rounded-start mb-2" alt="{{ $user->nome }}">
                        @endif
                        <h1>{{ $user->nome }}</h1>
                        <p>Indirizzo: <strong>{{ $user->indirizzo }}</strong></p>
                        <p>Partita IVA: <strong>{{ $user->P_IVA }}</strong></p>
                        <p>Tipologie:
                            <strong>{{ ucfirst(implode(', ',$user->types()->get()->pluck('nome')->toArray())) }}</strong>
                        </p>


                        <a href="/dishes" class="btn btn-primary">Piatti</a>
                        <a href="/orders" class="btn btn-secondary">Ordini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
