<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Product\EloquentProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewHomeController extends Controller
{
    public function __invoke()
    {
        $eloquentProductRepository= new EloquentProductRepository();
        $products = $eloquentProductRepository->getAll(['id','name','price','image']);
        $user = Auth::user();
        
        return view('home', [
            'products'=> $products,
            'user'=> $user,
        ]);
    }
}
