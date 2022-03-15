<?php

namespace Products\Application\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Products\Application\Http\Resources\ProductCollectionResource;
use Products\Application\Http\Resources\ProductResource;
use Products\Domain\Contracts\Repositories\ProductRepositoryInterface;
use Products\Domain\Model\Product;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProductBySkuCode(Product $product): JsonResource
    {
        return new ProductResource($product);
    }

    public function getProducts(): ResourceCollection
    {
        return new ProductCollectionResource($this->productRepository->getAllProducts());
    }
}
