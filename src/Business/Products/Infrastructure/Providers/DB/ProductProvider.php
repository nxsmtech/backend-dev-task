<?php

namespace Products\Infrastructure\Providers\DB;

use InvalidArgumentException;
use Illuminate\Support\Collection;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Model\Product;
use Products\Domain\Model\ProductSet;

class ProductProvider implements ProvidesProductInformation
{
    public function getAllProducts(): Collection
    {
        return Product::query()
            ->get();
    }

    public function getProductsBySkuCode(string $skuCode): ?Product
    {
        return Product::query()
            ->published()
            ->where('sku_code', '=', $skuCode)
            ->first();
    }

    public function getAllProductSets(): Collection
    {
        return ProductSet::query()->get();
    }

    public function getProductSetById(int $productSetId): ?ProductSet
    {
        return ProductSet::findOrFail($productSetId);
    }

    public function createProduct(array $productAttributes): Product
    {
        return Product::create($productAttributes);
    }

    public function updateProduct(int $productId, array $productAttributes): Product
    {
        $product = Product::findOrFail($productId);
        $product->update($productAttributes);
        return $product;
    }

    public function createProductSet(array $productSetAttributes): ProductSet
    {
        if (count($productSetAttributes['products']) === 0) {
            throw new InvalidArgumentException();
        }

        $products = Product::query()
            ->whereIn('id', $productSetAttributes['products'])
            ->whereDoesntHave('productSet')
            ->get();

        if ($products->count() === 0)  {
            throw new InvalidArgumentException();
        }

        $productSet = new ProductSet(
            [
                'name' => $productSetAttributes['name'],
            ]
        );
        $productSet->save();

        $productSet->products()->sync($products->pluck('id')->toArray());

        return $productSet;
    }

    public function updateProductSet(int $productSetId, array $productSetAttributes): ProductSet
    {
        $productSet = ProductSet::findOrFail($productSetId);

        if (count($productSetAttributes['products']) === 0) {
            throw new InvalidArgumentException();
        }

        $products = Product::query()
            ->whereIn('id', $productSetAttributes['products'])
            ->whereDoesntHave('productSet')
            ->get();

        if ($products->count() === 0)  {
            throw new InvalidArgumentException();
        }

        $productSet->name = $productSetAttributes['name'];
        $productSet->save();
        $productSet->products()->sync($products->pluck('id')->toArray());

        return $productSet;
    }
}
