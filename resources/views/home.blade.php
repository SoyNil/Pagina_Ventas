<!DOCTYPE html>
<html>
<head>
    <title>Home - Tienda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <h1>TIENDA SENATI</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.create') }}">Añadir Producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.showAll') }}">Eliminar Producto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.search') }}">Buscar Producto</a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Bienvenido a la Tienda</h1>
        <h3>Esta es una página web la cual cree inspirada en una tienda para el trabajo de SENATI. Esta página tiene funciones como "Productos", "Añadir productos", "Eliminar Productos", 
            "Buscar Productos" y "Cerrar Sesión". La funcion "Productos" hace que muestren todos los productos disponibles en la tienda o que hayan agregado los usuarios, la funcióna "Añadir productos"
            nos permite añadir productos a la tienda, la función "Eliminar Productos" nos ayuda a eliminar productos que nosotros hayamos creado y por último la función "Cerrar sesión" hace que cerremos
            la sesión que llevamos e iniciemos en otra cuenta.
        </h3>
        <!-- Aquí puedes agregar contenido adicional para la página principal -->
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>