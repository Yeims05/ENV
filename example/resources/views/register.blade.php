<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .register-form {
            display: flex;
            flex-direction: column;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .form-group button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        .back-home {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ url('register') }}" method="POST" class="register-form">
            @csrf
            <h2>Crear tu cuenta</h2>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>
            @if (session()->has('message'))
                <div class="form-group">
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif
            <div class="form-group">
                <button type="submit">Crear mi cuenta</button>
            </div>
            <div class="form-group">
                ¿Ya tienes una cuenta? <a href="{{ url('login') }}">Iniciar sesión</a>
            </div>
            <div class="form-group">
                <a href="{{ url('home') }}" class="back-home">Volver al Inicio</a>
            </div>
        </form>
    </div>
</body>

</html>
