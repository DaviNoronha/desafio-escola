<!doctype html>
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
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark"> 
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">Desafio<b>Escola</b></a>
            <a href="{{ url('/cursos') }}" class="navbar-brand">Administrar Cursos</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ route('login')}}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('register')}}" class="nav-link">Registrar</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>