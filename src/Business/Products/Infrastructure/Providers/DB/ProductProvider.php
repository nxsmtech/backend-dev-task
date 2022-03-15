<?php

namespace Products\Infrastructure\Providers\DB;

use Illuminate\Support\Collection;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Model\Product;
use Products\Domain\Model\ProductSet;

class ProductProvider implements ProvidesProductInformation
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

    public function getAllProductSets(): Collection
    {
        return ProductSet::query()->get();
    }

    public function getProductSetById(int $productSetId): ?ProductSet
    {
        return ProductSet::findOrFail($productSetId);
    }
}
