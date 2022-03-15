<?php

namespace Products\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;
use Products\Infrastructure\Repositories\ProductRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     * *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Infrastructure/Database/migrations');
//        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
