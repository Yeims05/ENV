<?php

namespace App\Repositories\Contracts;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Collection;

interface CartRepositoryInterface
{
    public function getUserCart(int $userId): Collection;
    public function getUserCartByProduct(int $userId, int $productId): ?Cart;
    public function createInitUserCartProduct(int $userId, int $productId): Cart;
    public function incrementQuantity(Cart $cart): void;
    public function decrementQuantity(Cart $cart): void;
    public function deleteCart(int $cartId): void;
    public function clearCart(int $userId): void;
}
