<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Tabla de Productos</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Formulario de Paciente</h2>
        <form method="post" action="/paciente/crear">
            @csrf
            <div class="form-row">
                <div class="form-group form-group col-md-2">
                    <label for="departamento">Departamento:</label>
                    <select name="departamento_id" id="departamento" class="form-control">
                        <option value="">Seleccione un departamento</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-group col-md-2">
                    <label for="municipios">Municipio:</label>
                    <select name="municipio_id" id="municipios" class="form-control">
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
                <div class="form-group form-group col-md-2">
                    <label for="genero_id">Genero:</label>
                    <select name="genero_id" id="genero" class="form-control">
                        <option value="">Seleccione Genero</option>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="tipoDocumento">Tipo de documento :</label>
                    <select name="tipo_documento_id" id="tipoDocumento" class="form-control">
                        <option value="">Seleccione tipo de documento</option>
                        @foreach($tiposDocumento as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-group col-md-3 ">
                    <label for="numero_documento">Numero de documento:</label>
                    <input class="form-control" type="text" method="POST" id="numero_documento" name="numero_documento" placeholder="Numero de documento">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group form-group col-md-3 ">
                    <input class="form-control " type="text" method="POST" name="nombre1" id="nombre1" placeholder="Primer nombre">
                </div>
                <div class="form-group form-group col-md-3 ">
                    <input class="form-control" type="text" name="nombre2" id="nombre2" placeholder="Segundo nombre">
                </div>
                <div class="form-group form-group col-md-3 ">
                    <input class="form-control" type="text" name="apellido1" id="apellido1" placeholder="Primero apellido">
                </div>
                <div class="form-group form-group col-md-3 ">
                    <input class="form-control" type="text" name="apellido2" id="apellido2" placeholder="Primero apellido">
                </div>
                <input class="form-control " type="hidden" name="id" id="paciente_id" placeholder="Primer nombre">
                <div class="form-group form-group col-md-4 mt-4 float-right">
                    <!-- <div class="form-row"> -->

                    <button class="btn btn-primary" type="submit" id="botonGuardar">Crear paciente</button>
                    <!-- </div>   -->
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <h2 class="mb-4">Tabla de Pacientes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">tipo de documento</th>
                    <th scope="col">documento</th>
                    <th scope="col">nombre</th>
                    <th scope="col">genero</th>
                    <th scope="col">departamento</th>
                    <th scope="col">municipio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $item)
                <tr>
                    <td>{{ $item->tipo_docu}}</td>
                    <td>{{ $item->numero_documento}}</td>
                    <td>{{ $item->nombre1}} {{ $item->nombre2}} {{ $item->apellido1}} {{ $item->apellido2}}</td>
                    <td>{{ $item->genero}}</td>
                    <td>{{ $item->departamento}}</td>
                    <td>{{ $item->municipio}}</td>
                    <td>
                        <div class="form-row">
                            <form method="get" action="pacientes/delete/{{$item->id}}">
                                <button type="submit" class="btn btn-danger"> Eliminar </button>
                            </form>
                            
                                
                            <button onclick="dataPorActualizar({{$item->id}})" id="ActualizarPaciente" class="btn btn-info"> update </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#departamento').on('change', function() {
                var departamento_id = $(this).val();
                if (departamento_id) {
                    $.ajax({
                        url: '/municipios_por_departamento/' + departamento_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#municipios').empty();
                            $('#municipios').append('<option value="">Seleccione un municipio</option>');
                            $.each(data, function(key, value) {
                                $('#municipios').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud: ' + error);
                        }
                    });
                } else {
                    $('#municipio').empty();
                    $('#municipio').append('<option value="">Seleccione un municipio</option>');
                }
            });
        });

        function dataPorActualizar(id){
            if (id) {
                    $.ajax({
                        url: '/pacientes/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#paciente_id").val(data.id)
                            $("#departamento").val(data.departamento_id)
                            $("#departamento").trigger('change');
                            $('#genero').val(data.genero_id);
                            $('#tipoDocumento').val(data.tipo_documento_id);
                            $('#numero_documento').val(data.numero_documento);
                            $('#nombre1').val(data.nombre1);
                            $('#nombre2').val(data.nombre2);
                            $('#apellido1').val(data.apellido1);
                            $('#apellido2').val(data.apellido2);
                            setTimeout(() => {
                                $('#municipios').val(data.municipio_id);
                            }, 500);
                            $('#botonGuardar').html("Actualizar Paciente")
                           
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud: ' + error);
                        }
                    });
                } else {
                    $('#municipio').empty();
                    $('#municipio').append('<option value="">Seleccione un municipio</option>');
                }
            
        }
    </script>
</body>

</html>