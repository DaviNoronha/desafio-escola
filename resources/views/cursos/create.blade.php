@extends('estilo.master')

@section('title', 'Formulário de Cursos')
    
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4>Cadastrar Curso</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('cursos.store') }}" method='POST' enctype="multipart/form-data">
                @csrf
                
                <div class="row">
                    <div class="form-group col-12">
                        <label for="titulo">Título do Curso: </label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror"  id="titulo" name="titulo" value="{{ old('titulo')}}">
                        @error('titulo')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="professor_id">Professor:</label>
                        <select class="form-control" id="professor_id" name="professor_id">
                            <option>Selecione um professor</option>
                            @foreach($professores as $professor)
                                <option value="{{ $professor->id }}">{{ $professor->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="valor">Valor do curso: </label>
                        <input type="text" class="form-control @error('valor') is-invalid @enderror"  id="valor" name="valor" value="{{ old('valor')}}">
                        @error('valor')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-md-8">
                        <label for="imagem">Imagem do curso: </label>
                        <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" value="{{ old('imagem')}}">
                        @error('imagem')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="descricao">Descrição do Curso: </label>
                        <textarea name="descricao" id="descricao" cols="30" rows="4" class="form-control" value="{{ old('descricao')}}"></textarea>
                        @error('descricao')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Curso</button>
                <a href="{{route('cursos.index')}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
            </form>
        </div>
    </div>
@endsection