<?php

namespace App\Repositories\Product;

use App\DTOs\AuthProductsDto;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function store(AuthProductsDto $authProductDto): void
    {
        Product::create([
            'name' => $authProductDto->getProductName(),
            'image' => $authProductDto->getProductImage(),
            'price' => $authProductDto->getProductPrice(),
        ]);
    }

    public function getAll(array $columns): Collection
    {
        return Product::all($columns);
    }

    public function update(AuthProductsDto $productUserDto): void
    {
        $product = Product::find($productUserDto->getProductId());
        $product->name = $productUserDto->getProductName();
        $product->image = $productUserDto->getProductImage();
        $product->price = $productUserDto->getProductPrice();
        $product->save();
    }

    public function delete(AuthProductsDto $authProductDto): void
    {
        $product = Product::find($authProductDto->getProductId());
        if ($product) {
            $product->delete();
        }
    }
}
