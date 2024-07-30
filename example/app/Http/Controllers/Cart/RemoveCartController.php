<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemoveCartController extends Controller
{
    private const QUANTITY_INIT = 1;

    public function __invoke(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->get('product_id');

        $cartOrNull = Cart::where('product_id', $productId)->where('user_id', $userId)->first();

        if (is_null($cartOrNull)) {
            return redirect()->back()->with('error', 'Producto no encontrado en el carrito.');
        }

        if ($cartOrNull->quantity === self::QUANTITY_INIT) {
            $cartOrNull->delete();
            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }

        $cartOrNull->quantity--;
        $cartOrNull->save();

        return redirect()->back()->with('success', 'Cantidad de producto actualizada.');
    }
}
