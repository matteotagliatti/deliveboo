@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <form action="{{ route('dishes.store') }}" method="POST">
                    @csrf

                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome">

                    <label for="descrizione">descrizione</label>
                    <input type="text" name="descrizione" id="descrizione">

                    <label for="ingredienti">ingredienti</label>
                    <input type="text" name="ingredienti" id="ingredienti">

                    <label for="prezzo">prezzo</label>
                    <input type="number" min="10" max="40" step=".01" name="prezzo" id="prezzo">

                    <label for="visibilita">Visibile?</label>
                    Si <input type="radio" name="visibilita" id="visibilita" checked value="1">
                    No <input type="radio" name="visibilita" id="visibilita" value="0">

                    <input type="submit" value="Aggiungi">
                </form>
            </div>
        </div>
    </div>
@endsection
