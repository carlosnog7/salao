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

                @if($agendamentos->isEmpty())
                    <p class="vazia">Agenda vazia.</p>
                @else
                    <div class="table-container">
                        <table class="table table-custom">
                            <label class="movimentacoes">CLIENTES AGENDADAS</label>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome do Cliente</th>
                                    <th scope="col">Procedimento</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Horário</th>
                                    <th scope="col">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendamentos as $agendamento)
                                    <tr>
                                        <th scope="row">{{ $agendamento->id }}</th>
                                        <td>{{ $agendamento->nome_cliente }}</td>
                                        <td>{{ $agendamento->procedimento }}</td>
                                        <td>R${{ number_format($agendamento->valor, 2, ',', '.') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($agendamento->data)->format('d/m/Y') }}</td>
                                        <td>{{ $agendamento->horario }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarAgendamento"
                                                data-bs-agendamento-id="{{ $agendamento->id }}"
                                                data-bs-agendamento-nome="{{ $agendamento->nome_cliente }}"
                                                data-bs-agendamento-procedimento="{{ $agendamento->procedimento }}"
                                                data-bs-agendamento-valor="{{ $agendamento->valor }}"
                                                data-bs-agendamento-data="{{ $agendamento->data }}"
                                                data-bs-agendamento-horario="{{ $agendamento->horario }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </button>
                                            <form action="{{ route('consultaragenda.destroy', $agendamento->id) }}" method="POST" class="d-inline">
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
    </div>

    <!-- modal -->
    @include('admin.consultaragenda.components.modal-editar-agendamento')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalEditarAgendamento = document.getElementById('modalEditarAgendamento');
            modalEditarAgendamento.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var agendamentoId = button.getAttribute('data-bs-agendamento-id');
                var agendamentoNome = button.getAttribute('data-bs-agendamento-nome'); 
                var agendamentoProcedimento = button.getAttribute('data-bs-agendamento-procedimento');
                var agendamentoValor = button.getAttribute('data-bs-agendamento-valor');
                var agendamentoData = button.getAttribute('data-bs-agendamento-data');
                var agendamentoHorario = button.getAttribute('data-bs-agendamento-horario');

        var form = modalEditarAgendamento.querySelector('#editarAgendamentoForm');
        form.action = '{{ route('consultaragenda.update', '') }}/' + agendamentoId;

        form.querySelector('#nome_cliente').value = agendamentoNome; 
        form.querySelector('#procedimento').value = agendamentoProcedimento;
        form.querySelector('#valor').value = agendamentoValor;
        form.querySelector('#data').value = agendamentoData;
        form.querySelector('#horario').value = agendamentoHorario;
    });
});


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
