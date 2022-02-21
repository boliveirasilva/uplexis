<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/bootstrap-logo.svg') }}" sizes="32x32" type="image/png">
    <title>upLexis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('internal-css')
</head>
<body>
<main class="container">
    @auth
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('img/bootstrap-logo-black.svg') }}" alt="logo" height="32px">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li>
                <a href="{{ route('carro.index') }}"
                   class="nav-link px-2 {{ Request::is('carro') ? 'link-secondary' : 'link-dark' }}">
                    Listar Veículos
                </a>
            </li>
            <li class=""></li>
            <li>
                <a href="{{ route('carro.create') }}"
                   class="nav-link px-2 {{ Request::is('carro/create') ? 'link-secondary' : 'link-dark' }}">
                    Capturar
                </a>
            </li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="{{ route('auth.logout') }}" class="link-danger me-2">Sair</a>
        </div>
    </header>
    @endauth

    @yield('flash-message')
    @yield('container')
</main>

@yield('javascript')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
