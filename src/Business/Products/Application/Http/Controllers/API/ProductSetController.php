<?php

namespace Products\Application\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Products\Application\Http\Requests\CreateProductSetRequest;
use Products\Application\Http\Requests\UpdateProductSetRequest;
use Products\Application\Http\Resources\ProductSetCollectionResource;
use Products\Application\Http\Resources\ProductSetResource;
use Products\Domain\Contracts\Repositories\ProductSetRepositoryInterface;

class ProductSetController extends Controller
{
    private ProductSetRepositoryInterface $productSetRepository;

    public function __construct(ProductSetRepositoryInterface $productSetRepository)
    {
        $this->productSetRepository = $productSetRepository;
    }

    public function createProductSet(CreateProductSetRequest $request): JsonResource
    {
        $validatedData = $request->validated();
        $productSet = $this->productSetRepository->createProductSet($validatedData);
        return new ProductSetResource($productSet);
    }

    public function updateProductSet(UpdateProductSetRequest $request, int $productSetId): JsonResource
    {
        $validatedData = $request->validated();
        $productSet = $this->productSetRepository->updateProductSet($productSetId, $validatedData);
        return new ProductSetResource($productSet);
    }

    public function getProductSets(): ResourceCollection
    {
        return new ProductSetCollectionResource($this->productSetRepository->getAllProductSets());
    }

    public function getProductSetById(int $productSetId): JsonResource
    {
        return new ProductSetResource($this->productSetRepository->getProductSetById($productSetId));
    }
}
