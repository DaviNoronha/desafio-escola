@extends('estilo.master')

@section('title', 'Cursos')

@section('content')
    <h2>{{$curso->titulo}}</h2>
    <h6>Professor: João da Silva</h6>
    <p>R$ {{$curso->valor}}</p>
    <p>{{$curso->descricao}}</p>

    <a href="/">Matricular</a>
@endsection