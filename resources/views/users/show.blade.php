@extends('estilo.master')

@section('title', 'Usuários')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        <div class="card w-75 p-1 mb-3">
            
            <div class="col-12">
                <h2>{{$user->nome}}</h2>
            </div>

            <div class="col-12 mt-4">
                <p>{{$user->email}}</p>
            </div>
        </div>
    </div>
@endsection