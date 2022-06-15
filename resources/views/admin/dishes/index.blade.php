@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="col-12">
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="/dishes/create" class="btn btn-primary">Aggiungi piatto</a>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Ingredienti</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Visibilità</th>
                        <th scope="col">Modifica / Cancella</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $dish->nome }}</td>
                            <td>{{ $dish->descrizione }}</td>
                            <td>{{ $dish->ingredienti }}</td>
                            <td>{{ $dish->prezzo }}</td>
                            <td>{{ $dish->visibilita ? 'Si' : 'No' }}</td>
                            <td>
                                <a href="#" class="btn btn-secondary">Modifica</a>
                                <a href="#" class="btn btn-danger">Elimina</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


@dump($dishes)
