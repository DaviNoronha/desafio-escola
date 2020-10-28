@extends('estilo.master')

@section('title', 'Formulário de Cursos')
    
@section('content')
    <div class="card mt-4">

        <div class="card-header">
        <h3>Cadastrar Curso</h3>
        </div>

            <div class="card-body">
                <form action="{{ route('cursos.store') }}" method='POST'>
                    @csrf

                    <div class="form-group">
                        <label for="titulo">Título do Curso: </label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"  id="titulo" name="titulo" value="{{ old('titulo')}}">
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor do curso: </label>
                        <input type="text" class="form-control @error('valor') is-invalid @enderror"  id="valor" name="valor" value="{{ old('valor')}}">
                    </div>

                    <div class="form-group">
                        <label for="imagem">Logo do curso: </label>
                        <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" value="{{ old('imagem')}}">
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição do Curso: </label>
                        <textarea name="descricao" id="descricao" cols="30" rows="10" class="form-control" value="{{ old('descricao')}}"></textarea>
                    </div>
                    
                    <a href="{{route('cursos.index')}}" class="btn btn-success"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Curso</button>
                
                </form>
            </div>
    </div>
@endsection