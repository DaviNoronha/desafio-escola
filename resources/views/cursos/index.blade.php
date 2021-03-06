@extends('estilo.master')

@section('title', 'Tabela de Cursos')

@section('content')
<div class="card mt-4">
    <div class="card-header">
        <h4>Tabela de Cursos</h4>
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
                @foreach ($cursos as $curso)   
                    <tr>
                        <td style="width: 35%">{{ $curso->titulo }}</td>
                        <td class="text-center">{{ $curso->professor->nome }}</td>
                        <td class="text-center">R$ {{ $curso->valor }}</td>
                        <td class="text-center d-flex justify-content-center align-items-center">
                            <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-success mr-2"><i class="fas fa-pen-fancy"></i></a>
                            <form method="POST" action="{{ route('cursos.destroy', $curso->id) }}">
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
        <a href="{{ route('cursos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Adicionar Curso</a>
    </div> 
</div>
@endsection
