<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        return view('cart', [
            'cart' => $cart
        ]);
    }

    public function checkout(Request $request)
    {
        // Verificar si el usuario está autenticado
        if (auth()->check()) {
            // Si está autenticado, redirigir a la página de pago
            return redirect()->route('payment');
        } else {
            // Si no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->route('login');
        }
    }
}
