<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\Cart\EloquentCartRepository;
use App\Repositories\Product\EloquentProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        
        $userId = Auth::id();

        $eloquentProductRepository = new EloquentProductRepository();
        $eloquentCartRepository = new EloquentCartRepository();
        $products = $eloquentProductRepository->getAll (['id','name','image','price']);
        $carts = $eloquentCartRepository->getUserCart($userId);
        $quantityTotal = 0;
        foreach ($carts as $cart) {
            $quantityTotal += $cart->quantity;
        }

        return view ('home', [
            'products'=>$products,
            'quantityTotal'=> $quantityTotal
        ]);
    }
}
