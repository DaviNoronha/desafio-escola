@extends('estilo.master')

@section('title', 'Formulário de Professor')
    
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4>Cadastrar Professor</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('professores.store') }}" method='POST'>
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"  id="nome" name="nome" value="{{ old('nome')}}">
                        @error('nome')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{ old('email')}}">
                        @error('email')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="telefone">Telefone: </label>
                        <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone')}}">
                        @error('telefone')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                <a href="{{route('professores.index')}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
            </form>
        </div>
    </div>
@endsection