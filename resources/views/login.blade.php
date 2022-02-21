@extends('layout')

@section('internal-css')
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }
</style>
@endsection

@section('container')
    <div class="form-signin text-center">
        @if($errors->any())
            <div class="alert alert-danger mb-4" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('auth.login') }}" method="POST">
            <img class="mb-4" src="{{ asset('img/login-icon.png') }}" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal">Entrar no sistema</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Endereço de E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
            @csrf

            <button class="w-100 btn btn-lg btn-primary" type="submit">Acessar</button>
            <p class="mt-5 mb-3 text-muted">Desafio &copy; 2022</p>
        </form>
    </div>
@endsection
