@extends('layouts.app')

@section('content')
    <h1>{{$user->nome}}</h1>
    <img src="{{$user->immagine}}" alt="">
@endsection