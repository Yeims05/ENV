<?php
namespace App\DTOs;

class AuthProductsDto
{
    private int $productId;
    private string $productName;
    private string $productImage;
    private float $productPrice;

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductImage(): string
    {
        return $this->productImage;
    }

    public function setProductImage(string $productImage): void
    {
        $this->productImage = $productImage;
    }

    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    public function setProductPrice(float $productPrice): void
    {
        $this->productPrice = $productPrice;
    }
}
