<?php

namespace Products\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;

class DatabaseProductRepository
{
    public function getAllProducts(): Collection
    {
        return Product::query()
            ->withoutGlobalScope('published')
            ->get();
    }

    public function getProductsBySkuCode(string $skuCode): ?Product
    {
        return Product::query()
            ->where('sku_code', '=', $skuCode)
            ->first();
    }
}
