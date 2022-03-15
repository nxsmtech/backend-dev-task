<?php

namespace Products\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;
use Products\Domain\Model\Product;

class ProductRepository implements ProductRepositoryInterface
{
    private ProvidesProductInformation $providesProductInformation;

    public function __construct(ProvidesProductInformation $providesProductInformation)
    {
        $this->providesProductInformation = $providesProductInformation;
    }

    public function getAllProducts(): Collection
    {
        return $this->providesProductInformation->getAllProducts();
    }

    public function getProductBySkuCode(string $skuCode): ?Product
    {
        return $this->providesProductInformation->getProductsBySkuCode($skuCode);
    }
}
