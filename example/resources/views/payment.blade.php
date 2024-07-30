<!-- resources/views/payment.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Página de Pago</h1>
        <div class="row">
            <div class="col-md-6">
                <h3>Detalles de los Productos</h3>
                <ul class="list-group mb-3">
                    @foreach($cart as $item)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            @if(isset($item['name']))
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            @else
                            <h6 class="my-0">Producto sin nombre</h6>
                            @endif
                            <small class="text-muted">Cantidad: {{ $item['quantity'] }}</small>
                        </div>
                        <span class="text-muted">${{ number_format($item['price'], 2) }}</span>
                    </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (COP)</span>
                        <strong>${{ number_format($totalPrice, 2) }}</strong>
                    </li>
                </ul>
            </div>
        </div>
            <div class="col-md-6">
                <!-- Aquí puedes agregar el formulario o detalles de pago -->
                <form action="{{ route('payment.process') }}" method="POST">
                    @csrf
                    <!-- Agrega aquí los campos del formulario de pago -->
                    <button type="submit" class="btn btn-primary">Procesar Pago</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
