<?php

namespace Products\Application\Providers;

use Illuminate\Support\ServiceProvider;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;
use Products\Domain\Contracts\Repositories\ProductSetRepositoryInterface;
use Products\Infrastructure\Providers\DB\ProductInformationProvider;
use Products\Infrastructure\Repositories\ProductRepository;
use Products\Infrastructure\Repositories\ProductSetRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProvidesProductInformation::class, ProductInformationProvider::class);

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductSetRepositoryInterface::class, ProductSetRepository::class);
    }

    /**
     * Bootstrap any application services.
     * *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Infrastructure/Database/migrations');
    }
}
