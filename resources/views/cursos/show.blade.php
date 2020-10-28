@extends('estilo.master')

@section('title', '{{$curso->titulo}}')

@section('content')
    <h2>{{$curso->titulo}}</h2>
    <p>R$ {{$curso->valor}}</p>
    <p>{{$curso->descricao}}</p>

    <a href="/">Matricular</a>
@endsection