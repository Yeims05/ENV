<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViewProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {
    }

    public function __invoke(): View
    {
        $products = $this->productRepositoryInterface->getAll(['id', 'name', 'image', 'price']);
        return view('product', ['products' => $products]);
    }
}
