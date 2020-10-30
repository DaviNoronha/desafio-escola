@extends('estilo.master')

@section('title', 'DesafioEscola')

@section('content')
    <div class="row mt-3">
        @foreach ($cursos as $curso)
            <div class="col-md-4">
            <a href="{{ route('cursos.show', $curso->id) }} ">
                <div class="card p-1 mb-3">
                    <div class="w-100" style="border: 1px solid #EEE;border-radius: 4px;height: 150px; background-size:cover; background-position:center; background-image: url('{{ env('APP_URL') }}/storage/{{ $curso->imagem }}')"></div>
                    <div class="card-body">
                        <h5 class="card-title text-dark"> {{ $curso->titulo }} </h5>
                        <h6 class="card-subtitle mb-2 text-dark">{{ $curso->professor->nome }}</h6>
                        <h6 style="font-weight: lighter" class="card-subtitle mb-2 mt-1 text-center text-secondary">R$ {{ $curso->valor }} </h6>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>

    
    <div class="row mt-3">
        <div class="col-12">
          {{ $cursos->links() }}
        </div>
    </div>
@endsection