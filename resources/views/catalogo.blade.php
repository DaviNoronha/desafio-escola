@extends('estilo.escola')

@section('title', 'DesafioEscola')

@section('content')
    <div class="row mt-3">
        @foreach ($cursos as $curso)
            <div class="col-md-3">
            <a href="{{ route('cursos.show', $curso->id) }} ">
                <div class="card">
                    <img src="{{url("/storage/curso/$curso->imagem")}} " class="card-img-top" alt="{{ $curso->titulo }} ">
                    <div class="card-body">
                        <h5 class="card-title text-dark"> {{ $curso->nome }} </h5>
                        <h6 class="card-subtitle mb-2 text-center text-dark">R$ {{ $curso->valor }} </h6>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>
@endsection