@extends('estilo.master')

@section('title', 'Formulário de Usuário')
    
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4>Cadastrar Usuário</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('users.store') }}" method='POST'>
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"  id="nome" name="nome" value="{{ old('nome')}}">
                        @error('nome')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="password">Senha: </label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password" value="{{ old('password')}}">
                        @error('password')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="password-repeat">Repita a Senha: </label>
                        <input type="password" class="form-control @error('password-repeat') is-invalid @enderror"  id="password-repeat" name="password-repeat" value="{{ old('password')}}">
                        @error('password')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                
                    <div class="form-group col-sm-6">
                        <label for="perfil_id">Perfil:</label>
                        <select class="form-control" id="perfil_id" name="perfil_id">
                            <option>Selecione um perfil</option>
                            @foreach($perfis as $perfil)
                                <option value="{{ $perfil->id }}">{{ $perfil->descricao }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                <a href="{{route('users.index')}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
            </form>
        </div>
    </div>
@endsection