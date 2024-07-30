<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $totalPrice = 0;

        // Verificar y ajustar los productos del carrito que no tengan precio definido
        foreach ($cart as &$item) {
            if (!isset($item['price'])) {
                // Aquí puedes definir un precio por defecto o manejar el caso como prefieras
                $item['price'] = 0; // Por ejemplo, se podría asignar un precio de 0 en caso de no estar definido
            }
            $totalPrice += $item['price'] * $item['quantity'];
        }
        unset($item); // Liberar la referencia al último elemento

        return view('payment', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }
}
