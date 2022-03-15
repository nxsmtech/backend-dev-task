<?php

namespace Products\Infrastructure\Repositories;

use Illuminate\Support\Collection;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Contracts\Repositories\ProductSetRepositoryInterface;
use Products\Domain\Model\ProductSet;

class ProductSetRepository implements ProductSetRepositoryInterface
{
    private ProvidesProductInformation $providesProductInformation;

    public function __construct(ProvidesProductInformation $providesProductInformation)
    {
        $this->providesProductInformation = $providesProductInformation;
    }

    public function getAllProductSets(): Collection
    {
        return $this->providesProductInformation->getAllProductSets();
    }

    public function getProductSetById(int $productSetId): ?ProductSet
    {
        return $this->providesProductInformation->getProductSetById($productSetId);
    }

    public function createProductSet(array $productSetAttributes): ProductSet
    {
        return $this->providesProductInformation->createProductSet($productSetAttributes);
    }

    public function updateProductSet(int $productSetId, array $productSetAttributes): ProductSet
    {
        return $this->providesProductInformation->updateProductSet($productSetId, $productSetAttributes);
    }
}
