@extends('estilo.escola')

@section('title', 'DesafioEscola')

@section('content')
    <div class="row mt-3">
        @foreach ($cursos as $curso)
            <div class="col-md-3">
            <a href="{{ route('cursos.show', $curso->id) }} ">
                <div class="card">
                    <img src="{{$curso->imagem}}" class="card-img-top" alt="{{ $curso->imagem}} ">
                    <div class="card-body">
                        <h5 class="card-title text-dark"> {{ $curso->nome }} </h5>
                        <h6 class="card-subtitle mb-2 text-center text-dark  ">João da Silva</h6>
                        <h6 style="font-weight: lighter" class="card-subtitle mb-2 text-center text-secondary">R$ {{ $curso->valor }} </h6>
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