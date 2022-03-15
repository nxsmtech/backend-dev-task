<?php

namespace Products\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;
use Products\Domain\Model\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts(): Collection
    {
        return Product::query()
            ->withoutGlobalScope('published')
            ->get();
    }
}
