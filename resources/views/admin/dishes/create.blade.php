@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Aggiungi un piatto') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('dishes.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="nome" class="form-control @error('nome') is-invalid @enderror"
                                        name="nome" value="{{ old('nome') }}" required autocomplete="nome" placeholder="Inserire nome del piatto">

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
                                        required autocomplete="descrizione" placeholder="Inserire descrizione del piatto">

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
                                        value="{{ old('ingredienti') }}" required autocomplete="ingredienti" autofocus placeholder="Inserire ingredienti">

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
                                        value="{{ old('prezzo') }}" required autocomplete="prezzo" autofocus placeholder="Inserire il prezzo">

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
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Aggiungi') }}
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
