@extends('estilo.master')

@section('title', 'Cursos')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="card w-75 p-1 mb-3">
            <div class="w-100" style="border: 1px solid #EEE;border-radius: 4px;height: 320px; background-size:cover; background-position:center; background-image: url('{{ env('APP_URL') }}/storage/{{ $curso->imagem }}')"></div>
            
            <div class="col-12">
                <h2>{{$curso->titulo}}</h2>
            </div>

            <div class="col-12">
                <h6>{{ $curso->professor->nome }}</h6>
                <p>R$ {{$curso->valor}}</p>
            </div>

            <div class="col-12 mt-4">
                <p>{{$curso->descricao}}</p>
            </div>
            @if (auth()->user()->perfil->nome == 'aluno')
            
                <div class="col-12">
                    <a href="/" class="btn btn-primary">Fazer matrícula</a>
                </div>
            @endif
        </div>
    </div>
@endsection