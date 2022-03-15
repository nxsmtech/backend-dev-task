<?php

namespace Products\Domain\Contracts\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Model\ProductSet;

interface ProductSetRepositoryInterface
{
    public function getAllProductSets(): Collection;

    public function getProductSetById(int $productSetId): ?ProductSet;

    public function createProductSet(array $productSetAttributes): ProductSet;

    public function updateProductSet(int $productSetId, array $productSetAttributes): ProductSet;
}
