<?php

namespace App\Console\Commands;

use App\Repositories\Product\EloquentProductRepository;
use App\DTOs\AuthProductsDto;
use Illuminate\Console\Command;

class DeleteProductCommand extends Command
{
    protected $signature = 'app:delete-product-command';
    protected $description = 'Comando para eliminar productos';

    public function handle()
    {
        $productId = $this->ask('Ingrese el ID del producto que desea eliminar');

        $authProductDto = new AuthProductsDto();
        $authProductDto->setProductId((int)$productId);

        $productRepository = new EloquentProductRepository();
        $productRepository->delete($authProductDto);

        $this->warn('Producto eliminado');
    }
}
