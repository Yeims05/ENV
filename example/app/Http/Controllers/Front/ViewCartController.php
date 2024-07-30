<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ViewCartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::with('product')->where('user_id', $userId)->get();

        return view('cart', ['cart' => $cart]);
    }
}
