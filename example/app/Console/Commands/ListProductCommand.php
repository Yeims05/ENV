<?php

namespace App\Console\Commands;

use App\Repositories\Product\EloquentProductRepository;
use Illuminate\Console\Command;

class ListProductCommand extends Command
{
    protected $signature = 'app:list-product-command';
    protected $description = 'Comando para listar productos';

    public function handle()
    {
    $this->info('Listado de productos');
    $productRepository = new EloquentProductRepository();
    $product = $productRepository ->getAll(['id', 'name', 'image', 'price' ]);
    $this->table(['ID', 'name', 'image', 'price'], $product);
    }

}
