@extends('estilo.master')

@section('title', 'Tabela de Professores')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h4>Tabela de Professores</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped">
            <thead style="font-weight: bold"> 
                <td>Título</td>
                <td class="text-center">Professor</td>
                <td class="text-center">Telefone</td>
                <td class="text-center">Ações</td>
            </thead>
            <tbody>
                @foreach ($professores as $professor)   
                    <tr>
                        <td style="width: 35%">{{$professor->nome}}</td>
                        <td class="text-center">{{$professor->email}}</td>
                        <td class="text-center">{{$professor->telefone}}</td>
                        <td class="text-center d-flex justify-content-center align-items-center">
                            <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-pen-fancy"></i></a>
                            <form method="POST" action="{{ route('professores.destroy', $professor->id) }}">
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
        <a href="{{ route('professores.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Adicionar Professor</a>
    </div> 
</div>
@endsection
