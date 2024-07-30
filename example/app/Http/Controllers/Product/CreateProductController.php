<?php

namespace App\Http\Controllers\Product;

use App\DTOs\AuthProductsDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{

    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {

    }

    public function __invoke(Request $request)
    {

        $image = $request->get('image');
        $price = $request->get('price');
        $name = $request->get('name');

        $authProductDto = new AuthProductsDto();
        $authProductDto -> setProductImage($image);
        $authProductDto -> setProductPrice($price);
        $authProductDto -> setProductName($name);

        $this->productRepositoryInterface->store($authProductDto);

        return redirect('product');


    }
}
