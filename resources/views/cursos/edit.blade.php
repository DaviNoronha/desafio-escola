@extends('estilo.master')

@section('title', 'Editar cursos')
    
@section('content')
    <div class="card mt-4">

        <div class="card-header">
            <h4>Editar Curso</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('cursos.update', $curso->id) }}" method='POST' style="font-weight: bold">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-12">
                        <label for="titulo">Título do Curso: </label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"  id="titulo" name="titulo" value="{{$curso->titulo}}">
                        @error('titulo')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="valor">Valor do curso: </label>
                        <input type="text" class="form-control @error('valor') is-invalid @enderror"  id="valor" name="valor" value="{{$curso->valor}}">
                        @error('valor')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-md-8">
                        <label for="imagem">Logo do curso: </label>
                        <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" value="{{$curso->imagem}}">
                        @error('imagem')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="descricao">Descrição do Curso: </label>
                        <textarea name="descricao" id="descricao" cols="30" rows="4" class="form-control">{{$curso->descricao}}</textarea>
                        @error('descricao')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Curso</button>
                <a href="{{route('cursos.index')}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
            </form>
        </div>
    </div>
@endsection