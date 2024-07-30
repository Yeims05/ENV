<?php

namespace App\Http\Controllers\Product;

use App\DTOs\AuthProductsDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {
    }

    public function __invoke($id, Request $request)
    {
        $authProductDto = new AuthProductsDto();
        $authProductDto->setProductId($id);
        $authProductDto->setProductName($request->get('name'));
        $authProductDto->setProductImage($request->get('image'));
        $authProductDto->setProductPrice($request->get('price'));

        $this->productRepositoryInterface->update($authProductDto);

        return redirect('product');
    }
}
