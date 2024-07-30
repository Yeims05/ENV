<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: white;
            padding: 0.5px 0.5px;
        }

        .header h1 {
            margin: 0;
        }

        .main {
            padding: 20px;
            text-align: center;
        }

        .main h2 {
            color: #333;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .cart-table th, .cart-table td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        .cart-table th {
            background-color: #f2f2f2;
        }

        .product-image {
            width: 50px;
            height: auto;
        }

        .btn-remove {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-remove:hover {
            background-color: #e74c3c;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn-checkout {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-checkout:hover {
            background-color: #45a049;
        }

        .empty-cart {
            color: #777;
        }

        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 0.01px 0;
            width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1>MARS</h1>
            <form action="{{ url('home') }}" method="GET">
                @csrf
                <button type="submit" class="btn-checkout">Volver al inicio</button>
            </form>
        </header>

        <main class="main">
            <h2>Bienvenido a tu carrito</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if($cart->isEmpty())
                <p class="empty-cart">Tu carrito está vacío.</p>
            @else
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            <tr>
                                <td><img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="product-image"></td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->product->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    <form action="{{ url('cart/remove') }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <button type="submit" class="btn-remove" onclick="return confirm('¿Estás seguro que deseas eliminar este producto?')">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="buttons">
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-checkout">Pagar</button>
                    </form>
                </div>
            @endif
        </main>

        <footer class="footer">
            <p>&copy; 2024 MARS - Todos los derechos reservados</p>
        </footer>
    </div>
</body>

</html>
