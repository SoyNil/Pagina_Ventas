
<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}"><h1>TIENDA SENATI</h1></a>
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
                    <a class="nav-link" href="#">Buscar Producto</a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="form-inline my-2 my-lg-0">
                @csrf
                <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </nav>
    
<form action="{{ route('products.search') }}" method="GET">
    <input type="text" name="query" placeholder="Buscar productos">
    <select name="sortBy">
        <option value="asc">Menor Precio</option>
        <option value="desc">Mayor Precio</option>
    </select>
    <button type="submit">Buscar</button>
</form>

<!-- Resultados de búsqueda -->
<ul>
    @foreach ($products as $product)
        <li>{{ $product->name }} - {{ $product->price }}</li>
    @endforeach
</ul>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>