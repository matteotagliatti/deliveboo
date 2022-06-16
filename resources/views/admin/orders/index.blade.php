@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="col-12">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @elseif (session('delete-message'))
                                <div class="alert alert-danger">
                                    {{ session('delete-message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Data e Ora</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td scope="row">{{ $order->prezzo }}</td>
                            <td scope="row">{{ $order->indirizzo }}</td>
                            <td scope="row">{{ $order->data_e_ora }}</td>
                            <td scope="row">{{ $order->nome }}</td>
                            <td scope="row">{{ $order->cognome }}</td>
                            <td scope="row">{{ $order->telefono }}</td>
                            <td scope="row">{{ $order->email }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

