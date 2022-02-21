@extends('layout')

@section('container')
    <div class="py-3 text-center">
        <h2>Importação de Veículos</h2>
        <p class="lead">Se o termo pesquisado retornar resultados válidos do estoque de veículos, eles serão importados para a base local.</p>
    </div>

    <form class="row g-3" action="{{ route('carro.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_term" placeholder="Capturar dados" aria-label="Capturar Veiculos" aria-describedby="btnImport">
            <button class="btn btn-outline-secondary" type="submit" id="btnImport">Capturar</button>
        </div>
    </form>

    @if (isset($imports))
    <div class="mt-4">Resultado: <hr></div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome/Modelo</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        @foreach($imports as $import)
            <tr>
                <td>{{ $import['id'] }}</td>
                <td>{{ $import['name'] }}</td>
                <td>{{ $import['status'] ? 'Importado com Sucesso!' : 'Duplicado - importação abortada' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
