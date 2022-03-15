<?php

namespace Products\Application\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Products\Application\Http\Requests\CreateProductRequest;
use Products\Application\Http\Requests\CreateProductSetRequest;
use Products\Application\Http\Requests\UpdateProductRequest;
use Products\Application\Http\Requests\UpdateProductSetRequest;
use Products\Application\Http\Resources\ProductCollectionResource;
use Products\Application\Http\Resources\ProductResource;
use Products\Application\Http\Resources\ProductSetCollectionResource;
use Products\Application\Http\Resources\ProductSetResource;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductBySkuCode(string $skuCode): JsonResource
    {
        $product = $this->productRepository->getProductBySkuCode($skuCode);

        if (!$product) {
            throw new ModelNotFoundException();
        }

        return new ProductResource($product);
    }

    public function getProducts(): ResourceCollection
    {
        return new ProductCollectionResource($this->productRepository->getAllProducts());
    }

    public function createProduct(CreateProductRequest $request): JsonResource
    {
        $validatedData = $request->validated();
        $product = $this->productRepository->createProduct($validatedData);
        return new ProductResource($product);
    }

    public function updateProduct(UpdateProductRequest $request, int $productId): JsonResource
    {
        $validatedData = $request->validated();
        $product = $this->productRepository->updateProduct($productId, $validatedData);
        return new ProductResource($product);
    }
}
