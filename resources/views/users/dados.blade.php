@extends('estilo.master')

@section('title', 'Formulário de Usuário')
    
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4>Dados do Usuário</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('users.salvarDados', $user->id) }}" method='POST'>
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nome">Nome: </label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror"  id="nome" name="nome" value="{{ $user->nome }}">
                        @error('nome')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email">Email: </label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" value="{{ $user->email }}">
                        @error('email')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    @if(auth()->user()->perfil->nome == 'aluno')
                    <div class="form-group col-sm-6">
                        <label for="telefone">Telefone: </label>
                        <input type="telefone" class="form-control @error('telefone') is-invalid @enderror"  id="telefone" name="telefone" value="{{ auth()->user()->aluno->telefone }}">
                        @error('telefone')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="data_nascimento">Data de Nascimento: </label>
                        <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror"  id="data_nascimento" name="data_nascimento" value="{{ auth()->user()->aluno->data_nascimento }}">
                        @error('data_nascimento')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="cpf">CPF: </label>
                        <input type="cpf" class="form-control @error('cpf') is-invalid @enderror"  id="cpf" name="cpf" value="{{ auth()->user()->aluno->cpf }}">
                        @error('cpf')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="biografia">Biografia: </label>
                        <textarea class="form-control @error('biografia') is-invalid @enderror"  id="biografia" name="biografia">{{ auth()->user()->aluno->biografia }}</textarea>
                        @error('biografia')<div class="invalid-feedback"> {{ $message }}</div>@enderror
                    </div>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
                @if($user->perfil->nome == 'aluno')
                    <a href="{{route('alunos.matricula', $user->aluno->id)}}" class="btn btn-success"><i class="fas fa-check"></i> Matricular</a>
                @endif
                <a href="{{route('users.index')}}" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
            </form>
        </div>
    </div>
@endsection