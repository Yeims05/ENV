<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions button {
            width: auto;
            padding: 5px 10px;
            font-size: 14px;
        }
        .actions .edit {
            background-color: #007bff;
        }
        .actions .edit:hover {
            background-color: #0056b3;
        }
        .actions .delete {
            background-color: #dc3545;
        }
        .actions .delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1>Crear Producto</h1>
        <form action="{{ url('product') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del Producto</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="price">Precio del Producto</label>
                <input type="number" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">Imagen del Producto</label>
                <input type="text" id="image" name="image" required>
            </div>
            <button type="submit">Crear Producto</button>
            <br> <br>
            <div class="back-button">
                <button onclick="location.href='{{ url('home') }}'">
                    <img src="https://cdn-icons-png.flaticon.com/128/3405/3405248.png" alt="Icono de Iniciar Sesión" style="width: 20px; height: 20px; margin-right: 10px;">
                    Volver al inicio
                </button>
            </div>
        </form>
    </div>

    <div class="container">
        <h1>Lista de Productos</h1>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 50px; height: 50px;"></td>
                        <td>
                            <div class="actions">
                                <form action="{{ url('product/edit/' . $product->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="name" value="{{ $product->name }}" required>
                                    <input type="number" name="price" value="{{ $product->price }}" required>
                                    <input type="text" name="image" value="{{ $product->image }}" required>
                                    <button type="submit" class="edit">Editar</button>
                                </form>
                                <form action="{{ url('product/delete/' . $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="delete">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
