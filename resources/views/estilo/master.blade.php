<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">Desafio<b>Escola</b></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('catalogo') }}" class="nav-link">Catálogo</a></li>
                @if(!auth())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrar</a></li>
                @else
                    @if(auth()->user()->perfil->nome != 'aluno')
                        <li class="nav-item"><a href="{{ route('cursos.index') }}" class="nav-link">Cursos</a></li>
                        <li class="nav-item"><a href="{{ route('professores.index') }}" class="nav-link">Professores</a></li>
                    @endif
                    @if(auth()->user()->perfil->nome == 'master')
                        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link">Usuários</a></li>
                    @endif
                    <li class="nav-item ml-2">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> {{ auth()->user()->nome }}</a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="javascript:void" onclick="$('#logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            <a class="dropdown-item" href="{{ route('users.dados') }}">Alterar Dados</a>
                            </div>
                        </div>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>