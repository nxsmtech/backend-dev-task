<?php

namespace Products\Domain\Contracts\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;
use Products\Domain\Model\ProductSet;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;

    public function getProductBySkuCode(string $skuCode): ?Product;

    public function getAllProductSets(): Collection;

    public function getProductSetById(int $productSetId): ?ProductSet;
}
