<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="custom-box d-flex flex-column align-items-center">
        <img src="{{ asset('/assets/images/logo.png') }}" alt="logo" class="logo">
        @if($mensagem = Session::get('erro'))
        {{$mensagem}}
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        @endif
        <form class="login-form" method="POST" action="{{ route('login.autenticacao') }}">
            @csrf
            <div data-mdb-input-init class="form-outline mb-4 custom-label">
                <label class="form-label" for="form2Example1">LOGIN</label>
                <input type="text" id="form2Example1" name="login" class="form-control custom-input"/>
            </div>
            <button type="submit" class="btn btn-primary btn-entrar">ENTRAR</button>
        </form>
    </div>
</body>
</html>
