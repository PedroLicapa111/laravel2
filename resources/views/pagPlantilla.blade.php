<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-4">
        <a href="{{ route('xIndex') }}" class="btn btn-primary"> Inicio </a>
        <a href="{{ route('xGaleria') }}" class="btn btn-primary"> Galeria </a>
        <a href="{{ route('xLista') }}" class="btn btn-primary"> Lista </a>
        <a href="{{ route('xListaSeg') }}" class="btn btn-primary"> Seguimiento </a>
    </div>

    <div class="container my-4">
        @yield('titulo')
    </div>

    <div class="container my-4">
        @yield('seccion')
    </div>

    <div class="container bg-dark text-white text-center">
        Pie de página
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>