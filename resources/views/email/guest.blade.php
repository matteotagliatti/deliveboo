@extends('layouts.email')

@section('content')
    <h1>Ordine inviato</h1>
    <h2>Riepilogo ordine</h2>
    <ul>
        <li>Nome ristorante: {{ $restaurant->nome }}</li>
        <li>Indirizzo ristorante: {{ $restaurant->indirizzo }}</li>
        <li>Totale: {{ $currentOrder->prezzo }} €</li>
        <li> Piatti ordinati:
            <ul>
                @foreach ($currentOrder->dishes as $dish)
                    <li>{{ $dish->nome }}</li>
                @endforeach
            </ul>

        </li>
    </ul>
@endsection
