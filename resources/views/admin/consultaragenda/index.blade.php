<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/consultaragenda.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
</head>

<body>

    <div class="custom-box d-flex flex-column align-items-center">
        <div class="agendamento-box">
            <h2>AGENDA</h2>
    </div>
    <div class="custom-box d-flex flex-column align-items-center">
        <div class="inner-box">
        <a href='{{ route('dashboard.index') }}' type="submit" class="btn btn-voltar">VOLTAR</a>

            @if($valores->isEmpty())
                <p class="vazia">Agenda vazia.</p>
            @else
            <div class="table-container">
                <table class="table">
                    <label class="movimentacoes">ULTIMAS MOVIMENTAÇÕES</label>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($valores as $valor)
                        <tr class="{{ $valor->acao == 'entrada' ? 'table-success' : 'table-danger' }}">
                            <th scope="row">{{ $valor->id }}</th>
                            <td>R${{ number_format($valor->valor, 2, ',', '.') }}</td>
                            <td>{{ $valor->descricao }}</td>
                            <td>{{ \Carbon\Carbon::parse($valor->data)->format('d/m/Y') }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarValor"
                                    data-bs-valor-id="{{ $valor->id }}"
                                    data-bs-valor-acao="{{ $valor->acao }}"
                                    data-bs-valor-valor="{{ $valor->valor }}"
                                    data-bs-valor-data="{{ $valor->data }}"
                                    data-bs-valor-descricao="{{ $valor->descricao }}">
                                    <i class="fa-solid fa-edit"></i>
                                </button>
                                <form action="{{ route('consultaragenda.destroy', $valor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    <!-- modal -->
    @include('admin.consultaragenda.components.modal-editar-valor')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var modalEditarValor = document.getElementById('modalEditarValor');
        modalEditarValor.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var valorId = button.getAttribute('data-bs-valor-id');
        var valorAcao = button.getAttribute('data-bs-valor-acao');
        var valorValor = button.getAttribute('data-bs-valor-valor');
        var valorData = button.getAttribute('data-bs-valor-data');
        var valorDescricao = button.getAttribute('data-bs-valor-descricao');

        var form = modalEditarValor.querySelector('#editarValorForm');
        form.action = '/consultaragenda/update/' + valorId;

        form.querySelector('#acao').value = valorAcao;
        form.querySelector('#valor').value = valorValor;
        form.querySelector('#data').value = valorData;
        form.querySelector('#descricao').value = valorDescricao;
    });
});
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
