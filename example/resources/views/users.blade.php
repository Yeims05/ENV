<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .table-container {
            margin-top: 1px;
        }
        .btn-container {
            margin-top: 1px;
        }
        .btn-custom {
            margin-right: 1px;
        }

        .back-home {
            width: 100%;
            padding: 10px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            display: block;
        }

        .back-home:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5 table-container">
        <h1 class="mb-4">Lista de Usuarios</h1>
        <table class="table table-striped">
            <a href="{{ url('home') }}" class="back-home">Volver al Inicio</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-container">
                                <button class="btn btn-danger btn-custom">Eliminar Usuario</button>
                                <button class="btn btn-warning btn-custom">Actualizar Usuario</button>
                                <button class="btn btn-info btn-custom">Modificar Rol</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
