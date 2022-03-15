<?php

namespace Products\Domain\Contracts\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Model\Product;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;
}
