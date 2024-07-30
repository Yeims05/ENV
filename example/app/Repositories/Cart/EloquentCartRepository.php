<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Repositories\Contracts\CartRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EloquentCartRepository implements CartRepositoryInterface
{
    public const QUANTITY_INIT = 1;

    public function getUserCart(int $userId): Collection
    {
        return Cart::where('user_id', '=', $userId)->get();
    }

    public function getUserCartByProduct(int $userId, int $productId): ?Cart
    {
        return Cart::where('product_id', '=', $productId)
            ->where('user_id', '=', $userId)
            ->first();
    }

    public function createInitUserCartProduct(int $userId, int $productId): Cart
    {
        return Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => self::QUANTITY_INIT
        ]);
    }

    public function incrementQuantity(Cart $cart): void
    {
        $cart->quantity++;
        $cart->save();
    }

    public function decrementQuantity(Cart $cart): void
    {
        $cart->quantity--;
        $cart->save();
    }

    public function deleteCart(int $cartId): void
    {
        Cart::destroy($cartId);
    }

    public function clearCart(int $userId): void
    {
        Cart::where('user_id', '=', $userId)->delete();
    }

}
