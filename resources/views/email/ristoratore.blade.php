@extends('layouts.email')

@section('content')
    <h1>Hai ricevuto un nuovo ordine</h1>
    <ul>
        <li>Nome: {{ $currentOrder->nome }} {{ $currentOrder->cognome }}</li>
        <li>Totale: {{ $currentOrder->prezzo }} €</li>
        <li>Indirizzo: {{ $currentOrder->indirizzo }}</li>
        <li>Telefono: {{ $currentOrder->telefono }}</li>
        <li>Email: {{ $currentOrder->email }}</li>
        <li> Piatti:
            <ul>
                @foreach ($currentOrder->dishes as $dish)
                    <li>{{ $dish->nome }}</li>
                @endforeach
            </ul>

        </li>
    </ul>
@endsection
