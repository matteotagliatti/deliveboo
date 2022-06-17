@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrati') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="nome@prova.com">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Inserire la password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Confermare la password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                                        name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus placeholder="Inserire il nome">

                                    @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="indirizzo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="indirizzo" type="text"
                                        class="form-control @error('indirizzo') is-invalid @enderror" name="indirizzo"
                                        value="{{ old('indirizzo') }}" required autocomplete="indirizzo" autofocus placeholder="Inserire l'indirizzo dell'attività">

                                    @error('indirizzo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="P_IVA"
                                    class="col-md-4 col-form-label text-md-right">{{ __('P. IVA*') }}</label>

                                <div class="col-md-6">
                                    <input id="P_IVA" type="text" class="form-control @error('P_IVA') is-invalid @enderror"
                                        name="P_IVA" value="{{ old('P_IVA') }}" required autocomplete="P_IVA" autofocus placeholder="Inserire la P. IVA">

                                    @error('P_IVA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="immagine"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Immagine (URL)') }}</label>

                                <div class="col-md-6">
                                    <input id="immagine" type="url"
                                        class="form-control @error('immagine') is-invalid @enderror" name="immagine"
                                        value="{{ old('immagine') }}" autocomplete="immagine" autofocus
                                        placeholder="https://...">

                                    @error('immagine')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
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
