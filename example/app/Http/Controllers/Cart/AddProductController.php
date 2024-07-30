<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddProductController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión primero para añadir productos al carrito.');
        }
        
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // Obtener la cantidad o establecer un valor predeterminado de 1
        $userId = Auth::id();

        // Buscar el producto en el carrito del usuario
        $cartItem = Cart::where('product_id', $productId)
                        ->where('user_id', $userId)
                        ->first();

        if ($cartItem) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Si el producto no está en el carrito, crear un nuevo registro
            $cartItem = new Cart();
            $cartItem->product_id = $productId;
            $cartItem->user_id = $userId;
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }
}
