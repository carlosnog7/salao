<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/layout.css" rel="stylesheet">
</head>
<body>
    <div class="custom-box d-flex flex-column align-items-center">
        <img src="{{ asset('/assets/images/salao.png') }}" alt="logo" class="logo" onclick="location.href='{{ route('dashboard.index') }}'">
        <form class="login-form"> 
            <a href="{{ route('agendarcliente.index') }}" type="button" class="btn btn-primary btn-inserir">AGENDAR CLIENTE</a>
            <a href="{{ route('consultaragenda.index') }}" type="button" class="btn btn-primary btn-consultar">CONSULTAR AGENDA</a>
        </form>
    </div>
</body>
</html>
