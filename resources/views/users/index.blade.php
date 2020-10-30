@extends('estilo.master')

@section('title', 'Tabela de Usuários')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h4>Tabela de Usuários</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead style="font-weight: bold"> 
                <td>Nome</td>
                <td class="text-center">Perfil</td>
                <td class="text-center">Email</td>
                <td class="text-center">Ações</td>
            </thead>
            <tbody>
                @foreach ($users as $user)   
                    <tr>
                        <td style="width: 35%">{{ $user->nome }}</td>
                        <td class="text-center">{{$user->perfil->descricao}}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center d-flex justify-content-center align-items-center">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-pen-fancy"></i></a>
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Adicionar Usuário</a>
    </div> 
</div>
@endsection