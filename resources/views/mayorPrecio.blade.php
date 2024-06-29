<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tabla de Productos</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tabla de Productos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Fabricante</th>
                    <th scope="col">ID Producto</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Precio con iva</th>
                    <th scope="col">Existencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mayor as $item)
                    <tr>
                        <td>{{ $item -> id_fabricante}}</td>
                        <td>{{ $item -> id_producto}}</td>
                        <td>{{ $item -> descripcion}}</td>
                        <td>{{ $item -> precio}}</td>
                        <td>{{ $item -> precio_iva}}</td>
                        <td>{{ $item -> existencia}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>