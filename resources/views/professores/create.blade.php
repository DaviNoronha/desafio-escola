@extends('estilo.master')

@section('title', 'Formulário de Professor')
    
@section('content')
    <div class="card mt-4">

        <div class="card-header">
        <h3>Cadastrar Professor</h3>
        </div>

            <div class="card-body">
                <form action="{{ route('professores.store') }}" method='POST'>
                    @csrf

                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"  id="nome" name="nome" value="{{ old('nome')}}">
                        @error('nome')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{ old('email')}}">
                        @error('email')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone: </label>
                        <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone')}}">
                        @error('telefone')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    
                    <a href="{{route('professores.index')}}" class="btn btn-success"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                
                </form>
            </div>
    </div>
@endsection