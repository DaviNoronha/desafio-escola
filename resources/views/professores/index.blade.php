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
                <td class="text-center">Preço do curso</td>
                <td class="text-center">Ações</td>
            </thead>
            <tbody>
                @foreach ($professores as $professor)   
                    <tr>
                        <td style="width: 35%">{{$professor->nome}}</td>
                        <td class="text-center">{{$professor->email}}</td>
                        <td class="text-center">{{$professor->telefone}}</td>
                        <td class="text-center">
                            <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-success"><i class="fas fa-pen-fancy"></i></a>
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
