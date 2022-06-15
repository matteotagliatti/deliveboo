@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('dishes.update', $dish) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $dish->nome }}">

                    <label for="descrizione">descrizione</label>
                    <input type="text" name="descrizione" id="descrizione" value="{{ $dish->descrizione }}">

                    <label for="ingredienti">ingredienti</label>
                    <input type="text" name="ingredienti" id="ingredienti" value="{{ $dish->ingredienti }}">

                    <label for="prezzo">prezzo</label>
                    <input type="number" min="10" max="40" step=".01" name="prezzo" id="prezzo"
                        value="{{ $dish->prezzo }}">

                    <label for="visibilita">Visibile?</label>
                    @if ($dish->visibilita)
                        Si <input type="radio" name="visibilita" id="visibilita" checked value="1">
                        No <input type="radio" name="visibilita" id="visibilita" value="0">
                    @else
                        Si <input type="radio" name="visibilita" id="visibilita" value="1">
                        No <input type="radio" name="visibilita" id="visibilita" checked value="0">
                    @endif


                    <input type="submit" value="Modifica">
                </form>
            </div>
        </div>
    </div>
@endsection
