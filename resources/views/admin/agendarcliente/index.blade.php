<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/agendarcliente.css" rel="stylesheet">
</head>

<body>
    <div class="custom-box d-flex flex-column align-items-center">
        <div class="agendamento-box">
            <h2>AGENDAMENTO</h2>
    </div>
    <div class="custom-box d-flex flex-column align-items-center">
        <div class="inner-box">
           <a href='{{ route('dashboard.index') }}' type="button" class="btn btn-voltar">VOLTAR</a>
           <form id="formAgendarCliente" action="{{ route('agendarcliente.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label class="descricao-label" for="nomedacliente">Nome da Cliente</label>
            <input type="text" id="nomedacliente" name="nomedacliente" class="form-control custom-input" required />
        </div>
        <div class="col-md-6">
            <label class="descricao-label" for="procedimento">Procedimento</label>
            <input type="text" id="procedimento" name="procedimento" class="form-control custom-input" required />
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="valor-label" for="valor">Valor</label>
                <input type="text" id="valor" name="valor" class="form-control" placeholder="0,00" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="data-label" for="data">Data</label>
                <input type="date" id="data" name="data" class="form-control" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="horario-label" for="horario">Horário</label>
                <select id="horario" name="horario" class="form-control" required>
                    <option value="" disabled selected>Escolha um Horário</option>
                    <option value="09:00">09:00</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-salvar">SALVAR</button>
</form>

        </div>
    </div>
</body>

</html>
