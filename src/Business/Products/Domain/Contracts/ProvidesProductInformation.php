<?php

namespace Products\Domain\Contracts;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;

interface ProvidesProductInformation
{
    public function getAllProducts(): Collection;

    public function getProductsBySkuCode(string $skuCode): ?Product;
}
