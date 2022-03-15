<?php

namespace Products\Domain\Contracts\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;

    public function getProductBySkuCode(string $skuCode): ?Product;

    public function createProduct(array $productAttributes): Product;

    public function updateProduct(int $productId, array $productAttributes): Product;
}
