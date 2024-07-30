<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
        }

        h3 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            color: #495057;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
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
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Iniciar Sesión</button>
            <h4>No tienes una cuenta? registrate :)</h4>

            <a href="{{ url('register') }}" class="back-home">Registrarse</a>
            <a href="{{ url('home') }}" class="back-home">Regresa al Inicio</a>
        </form>
    </div>
</body>
</html>
