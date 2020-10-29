@extends('estilo.master')

@section('title', 'Edição de Professor')
    
@section('content')
    <div class="card mt-4">

        <div class="card-header">
        <h3>Editar Professor</h3>
        </div>

            <div class="card-body">
                <form action="{{ route('professores.update', $professor->id) }}" method='POST'>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"  id="nome" name="nome" value="{{$professor->nome}}">
                        @error('nome')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{$professor->email}}">
                        @error('email')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone: </label>
                        <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{$professor->telefone}}">
                        @error('telefone')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    
                    <a href="{{route('professores.index')}}" class="btn btn-success"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                
                </form>
            </div>
    </div>
@endsection