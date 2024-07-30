<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/css/home.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tienda</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos generales de la página */
        body {
            font-family: sans-serif;
        }

        .grid_container {
            background: #fff;
            margin: auto;
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-columns: 1fr 10fr;
            grid-template-rows: 2fr 10fr 1fr;
            grid-template-areas:
                "logo header header"
                "main main main"
                "fSideEmpty footer footer";
        }

        .logo {
            grid-area: logo;
            background-color: #eee;
            padding: 10px;
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 80%;
        }

        .header {
            grid-area: header;
            background-color: #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .header nav {
            display: flex;
            align-items: center;
        }

        .header nav a {
            padding: 10px;
            margin-right: 20px;
            color: #222;
            text-decoration: none;
            transition: 0.6s;
        }

        .header nav a:hover {
            background-color: #222;
            border-radius: 20px;
            color: #eee;
        }

        .header nav form {
            margin: 0;
        }

        .header nav form button {
            background: none;
            border: none;
            padding: 10px;
            color: #222;
            cursor: pointer;
            transition: 0.6s;
        }

        .header nav form button:hover {
            background-color: #222;
            border-radius: 20px;
            color: #eee;
        }

        .mSideEmpty {
            grid-area: mSideEmpty;
        }

        .main {
            grid-area: main;
            padding: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .main .card {
            margin: 3%;
            padding: 1%;
            width: 20%;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            box-shadow: 0px 0px 15px 2px #ccc;
            border-radius: 10px;
            transition: 0.3s;
        }

        .main .card .card-img {
            border-radius: 10px;
            margin: auto;
            width: 100%;
        }

        .main .card .quantity-input {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .main .card .quantity-input label {
            margin-right: 10px;
        }

        .main .card .quantity-input input {
            width: 50px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .main .card .card-btn {
            font-size: 0.8em;
            width: 50%;
            padding: 8px;
            font-weight: bold;
            border: 1px solid transparent;
            background-color: #aaa;
            border-radius: 5px;
            transition: 0.5s;
        }

        .main .card .card-btn:hover {
            border-radius: 10px;
            width: 100%;
            background-color: #333;
            color: #fff;
            letter-spacing: 2px;
        }

        .main .card:hover {
            box-shadow: 0px 0px 35px 1px #999;
        }

        .fSideEmpty {
            grid-area: fSideEmpty;
            background-color: #eee;
        }

        .footer {
            grid-area: footer;
            background-color: #eee;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer a {
            text-decoration: none;
        }

        /* Estilos para el menú de hamburguesa */
        #menuToggle {
            display: block;
            position: relative;
            z-index: 1;
            user-select: none;
            cursor: pointer;
            padding: 10px;
        }

        #menuToggle input {
            display: block;
            width: 40px;
            height: 32px;
            position: absolute;
            top: -7px;
            left: -5px;
            cursor: pointer;
            opacity: 0;
            z-index: 2;
        }

        #menuToggle span {
            display: block;
            width: 33px;
            height: 4px;
            margin-bottom: 5px;
            position: relative;
            background: #333;
            border-radius: 3px;
            z-index: 1;
            transform-origin: 4px 0px;
            transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0), background 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0), opacity 0.55s ease;
        }

        #menuToggle span:first-child {
            transform-origin: 0% 0%;
        }

        #menuToggle span:nth-last-child(2) {
            transform-origin: 0% 100%;
        }

        #menuToggle input:checked ~ span {
            opacity: 1;
            transform: rotate(45deg) translate(-2px, -1px);
            background: #cdcdcd;
        }

        #menuToggle input:checked ~ span:nth-last-child(3) {
            opacity: 0;
            transform: rotate(0deg) scale(0.2, 0.2);
        }

        #menuToggle input:checked ~ span:nth-last-child(2) {
            transform: rotate(-45deg) translate(0, -1px);
        }

        #menu {
            position: absolute;
            width: 200px;
            margin: 20px 0 0 -50px;
            padding: 50px;
            padding-top: 125px;
            background: #f9f9f9;
            list-style-type: none;
            -webkit-font-smoothing: antialiased;
            transform-origin: 0% 0%;
            transform: translate(-100%, 0);
            transition: transform 0.5s cubic-bezier(0.77, 0.2, 0.05, 1.0);
        }

        #menu li {
            padding: 10px 0;
            font-size: 18px;
        }

        #menuToggle input:checked ~ ul {
            transform: none;
        }

        #menu a {
            color: #222;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        #menu a:hover {
            color: tomato;
        }
    </style>
</head>
<body>
    <div class="grid_container">
        <div class="logo"><img src="https://esp.mars.com/sites/g/files/jydpyr391/files/2019-03/Logos_MARS_WRIGLEY_CONFECTIONERY_16.png" alt="."></div>
        <header class="header">
            <h1></h1>
            <nav class="nav">
                @if(Auth::check())
                <span>Bienvenido, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
                @else
                <a href="{{url ('login')}}">Iniciar sesión</a>
                <a href="{{url ('register')}}">Registrarse</a>
                @endif
                <a href="{{url ('cart')}}">Carrito</a>

                <div id="menuToggle">

                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>

                    <ul id="menu">
                    <a href="/users"><li>Manejo de usuarios</li></a>
                    <a href="/product"><li>Manejo de productos</li></a>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="mSideEmpty"></div>
        <main class="main">
            @forelse ($products as $product)
                <div class="card">
                    <img class="card-img" src="{{ $product->image }}" alt="Imagen de producto">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text">Precio: {{ $product->price }}</p>
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="quantity-input">
                            <label for="quantity-{{ $product->id }}">Cantidad:</label>
                            <input type="number" id="quantity-{{ $product->id }}" name="quantity" value="1" min="1">
                        </div>
                        <button type="submit" class="card-btn">Añadir al carrito</button>
                    </form>
                </div>
            @empty
                <p>No hay productos en esta tienda, vuelva pronto.</p>
            @endforelse
        </main>
        <div class="fSideEmpty"></div>
        <footer class="footer">
            <a href="#">Términos y condiciones</a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
