@extends('estilo.master')

@section('title', 'Professores')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="card w-75 p-1 mb-3">
            <div class="col-12">
                <h2>{{$professor->nome}}</h2>
            </div>
            <div class="col-12">
                <p>{{$professor->email}}</p>
            </div>
            <div class="col-12">
            <p>{{ $professor->curso->titulo }}</p>
            </div>
        </div>
    </div>
@endsection