<?php
namespace App\Providers;

use App\Repositories\Cart\EloquentCartRepository;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Product\EloquentProductRepository;
use App\Repositories\User\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Repositorios
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(CartRepositoryInterface::class, EloquentCartRepository::class);

        // Use cases

        // Services
    }

    public function boot(): void
    {
        //
    }
}
