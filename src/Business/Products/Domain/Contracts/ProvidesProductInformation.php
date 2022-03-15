<?php

namespace Products\Domain\Contracts;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;
use Products\Domain\Model\ProductSet;

interface ProvidesProductInformation
{
    public function getAllProducts(): Collection;

    public function getProductsBySkuCode(string $skuCode): ?Product;

    public function getAllProductSets(): Collection;

    public function getProductSetById(int $productSetId): ?ProductSet;

    public function createProduct(array $productAttributes): Product;

    public function updateProduct(int $productId, array $productAttributes): Product;
}
