@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                {{-- <form action="{{ route('dishes.update', $dish) }}" method="POST">
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
                </form> --}}
                <div class="card">
                    <div class="card-header">{{ __('Modifica un piatto') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dishes.update', $dish) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="nome" class="form-control @error('nome') is-invalid @enderror"
                                        name="nome" value="{{ $dish->nome }}" required autocomplete="nome">

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="descrizione"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione*') }}</label>

                                <div class="col-md-6">
                                    <input id="descrizione" type="descrizione"
                                        class="form-control @error('descrizione') is-invalid @enderror" name="descrizione"
                                        required autocomplete="descrizione" value="{{ $dish->descrizione }}">

                                    @error('descrizione')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ingredienti"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Ingredienti*') }}</label>

                                <div class="col-md-6">
                                    <input id="ingredienti" type="text"
                                        class="form-control @error('ingredienti') is-invalid @enderror" name="ingredienti"
                                        value="{{ $dish->ingredienti }}" required autocomplete="ingredienti" autofocus>

                                    @error('ingredienti')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prezzo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prezzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="prezzo" type="number" min="1" max="40" step=".01"
                                        class="form-control @error('prezzo') is-invalid @enderror" name="prezzo"
                                        value="{{ $dish->prezzo }}" required autocomplete="prezzo" autofocus>

                                    @error('prezzo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="visiblita"
                                    class="col-md-4 col-form-label text-md-right">{{ __('È visibile?*') }}</label>

                                <div class="col-md-6">
                                    @if ($dish->visibilita)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibilita" id="visibilita"
                                                checked value="1">
                                            <label class="form-check-label" for="visibilita">
                                                Sì
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibilita" id="visibilita"
                                                value="0">
                                            <label class="form-check-label" for="visibilita">
                                                No
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibilita" id="visibilita"
                                                value="1">
                                            <label class="form-check-label" for="visibilita">
                                                Sì
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="visibilita" id="visibilita"
                                                checked value="0">
                                            <label class="form-check-label" for="visibilita">
                                                No
                                            </label>
                                        </div>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Modifica') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
