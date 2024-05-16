<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<section class="form-main">
    <div class="form-conte">
    <div class="box">
        <h2>INICIAR SESIÓN</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-box">
                <label for="email">Correo electrónico</label>
                <input type="email" class="input-control" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}" required>
            </div>
            <div class="input-box">
                <label for="password">Contraseña</label>
                <input type="password" class="input-control" id="password" placeholder="Ingrese su contraseña" name="password" required>
            </div>
            <input class="btn" type="submit" value="Iniciar sesión">
            <p><label>¿No tienes una cuenta? Cree una aquí</label></p>
            <a href="{{ route('register') }}"><input class="btn" type="button" value="Registrarse"></a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                @if ($error == 'The provided credentials do not match our records.')
                    <li>Los datos ingresados no coinciden con nuestro sistema</li>
                @else
                    <li>{{ $error }}</li>
                @endif
                @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
    </div>
</section>
</body>
</html>