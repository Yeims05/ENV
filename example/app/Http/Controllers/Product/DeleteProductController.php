<?php

namespace App\Http\Controllers\Product;

use App\DTOs\AuthProductsDto;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {
    }

    public function __invoke($id)
    {
        $authProductDto = new AuthProductsDto();
        $authProductDto->setProductId($id);

        $this->productRepositoryInterface->delete($authProductDto);

        return redirect('product');
    }
}
