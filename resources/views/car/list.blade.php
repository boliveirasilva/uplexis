@extends('layout')

@section('flash-message')
    @if(session()->has('flash_messages'))
    <div id="message_card"
        class="alert alert-{{ session('flash_messages')['status'] ? 'success' : 'danger' }} alert-dismissible"
        role="alert">

        {{ session('flash_messages')['message'] }}

    </div>
    @endif
@endsection

@section('container')
    <div class="py-3 text-center">
        <h2>Veículos em Estoque</h2>
        <p class="lead">Listagem dos veículos salvos na base de dados local.</p>
    </div>

    <div class="table-responsive fixed-table-body">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome/Modelo</th>
            <th scope="col">Ano</th>
            <th scope="col">Combustível</th>
            <th scope="col">Portas</th>
            <th scope="col">Quilometragem</th>
            <th scope="col">Câmbio</th>
            <th scope="col">Cor</th>
{{--            <th scope="col">Preço</th>--}}
            <th scope="col">Responsável</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

    @forelse($carros as $carro)
            <tr>
                <th rowspan="2" scope="row">{{ $carro->id }}</th>
                <td>{{ $carro->nome_veiculo }}</td>
                <td>{{ $carro->ano }}</td>
                <td>{{ $carro->combustivel }}</td>
                <td>{{ $carro->portas }}</td>
                <td>{{ $carro->quilometragem }}</td>
                <td>{{ $carro->cambio }}</td>
                <td>{{ $carro->cor }}</td>
{{--                <td class="text-nowrap">{{ $carro->formated_price }}</td>--}}
                <td>{{ $carro->user->name }}</td>
                <td rowspan="2" style ="word-break:keep-all;">
{{--                    <a href="#" data-bs-toggle="tooltip" title="Exibir Detalhes" class="me-3" style="text-decoration: none">--}}
{{--                        <i class="bi bi-search text-secondary"></i>--}}
{{--                    </a>--}}
                    <form action="{{ route('carro.destroy', $carro->id) }}" method="POST" style="display: inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-link link-danger px-0 py-0" type="submit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <tr class="sub-row">
                <td colspan="6"><b>Link:</b> <small>{{ $carro->link }}</small></td>
                <th scope="row">Preço</th>
                <td class="text-nowrap">{{ $carro->formated_price }}</td>
            </tr>
    @empty
        <tr>
            <td colspan="8" style="line-height: 4em; text-align: center;">Não há carros para serem listados</td>
        </tr>
    @endforelse
        </tbody>
    </table>
    </div>
@endsection
