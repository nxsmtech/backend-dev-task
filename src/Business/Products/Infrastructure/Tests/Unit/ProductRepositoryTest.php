<?php

namespace Products\Infrastructure\Tests\Unit;

use Mockery;
use Products\Domain\Contracts\ProvidesProductInformation;
use Products\Domain\Model\Product;
use Products\Infrastructure\Repositories\ProductRepository;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    public function testGetAllProducts(): void
    {
        $products = Product::factory()->count(3)->create();

        $productInformationProviderMock = Mockery::mock(ProvidesProductInformation::class);
        $productInformationProviderMock
            ->shouldReceive('getAllProducts')
            ->andReturn($products);

        $productRepository = new ProductRepository($productInformationProviderMock);

        $this->assertEquals($products->count(), $productRepository->getAllProducts()->count());
    }
}
