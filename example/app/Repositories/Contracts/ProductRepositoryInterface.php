<?php

namespace App\Repositories\Contracts;

use App\DTOs\AuthProductsDto;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{

    public function store(AuthProductsDto $authProductDto): void;

    public function GetAll(array $columns):Collection;

    public function update(AuthProductsDto $productUserDto):void;

    public function delete(AuthProductsDto $authProductDto):void;

}


