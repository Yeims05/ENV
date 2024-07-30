<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewPageController extends Controller
{
    public function __invoke()
    {
        // Obtener todos los productos de la base de datos
        $products = Product::all();

        // Pasar los productos a la vista
        return view('page', compact('products'));
    }
}
