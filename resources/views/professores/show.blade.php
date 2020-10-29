@extends('estilo.master')

@section('title', 'Professores')

@section('content')
    <h2>{{$professor->nome}}</h2>
    <h6>Curso: Laravel Developer</h6>
    <p>{{$professor->email}}</p>
    <p>{{$professor->telefone}}</p>

    <a href="/">Matricular</a>
@endsection