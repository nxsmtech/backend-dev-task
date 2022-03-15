<?php

namespace Products\Infrastructure\Providers\DB;

use Illuminate\Support\Collection;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Model\Product;
use Products\Infrastructure\Repositories\DatabaseProductRepository;

class ProductProvider implements ProvidesProductInformation
{
    private DatabaseProductRepository $databaseProductRepository;

    public function __construct(DatabaseProductRepository $databaseProductRepository)
    {
        $this->databaseProductRepository = $databaseProductRepository;
    }

    public function getAllProducts(): Collection
    {
        return $this->databaseProductRepository->getAllProducts();
    }

    public function getProductsBySkuCode(string $skuCode): ?Product
    {
        return $this->databaseProductRepository->getProductsBySkuCode($skuCode);
    }
}
