<?php

namespace Products\Infrastructure\Tests\Unit;

use Products\Domain\Model\Product;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    public function testCreateProduct(): void
    {
        $productCreatePostData = [
            'sku_code' => 99999999,
            'name' => 'file',
            'type' => 'device',
            'condition' => 'new',
            'description_title' => 'Description title',
            'description_text' => 'Description text',
            'price' => 101.0,
            'published' => true,
        ];

        $response = $this->postJson('/products/api/products/add', $productCreatePostData);
        $responseContent = json_decode($response->content());
        $newProductResponseData = $responseContent->data;

        $this->assertEquals($productCreatePostData, [
            'sku_code' => $newProductResponseData->sku_code,
            'name' => $newProductResponseData->name,
            'type' => $newProductResponseData->type,
            'condition' => $newProductResponseData->condition,
            'description_title' => $newProductResponseData->description_title,
            'description_text' => $newProductResponseData->description_text,
            'price' => $newProductResponseData->price,
            'published' => $newProductResponseData->published,
        ]);
    }

    public function testUpdateProduct(): void
    {
        $productUpdatePostData = [
            'sku_code' => 99999988,
            'name' => 'file',
            'type' => 'device',
            'condition' => 'new',
            'description_title' => 'Description title',
            'description_text' => 'Description text',
            'price' => 151.0,
            'published' => false,
        ];

        $product = Product::factory()->create();

        $response = $this->postJson('/products/api/products/update/' . $product->id, $productUpdatePostData);

        $responseContent = json_decode($response->content());
        $updatedProductResponseData = $responseContent->data;

        $this->assertEquals($productUpdatePostData, [
            'sku_code' => $updatedProductResponseData->sku_code,
            'name' => $updatedProductResponseData->name,
            'type' => $updatedProductResponseData->type,
            'condition' => $updatedProductResponseData->condition,
            'description_title' => $updatedProductResponseData->description_title,
            'description_text' => $updatedProductResponseData->description_text,
            'price' => $updatedProductResponseData->price,
            'published' => $updatedProductResponseData->published,
        ]);
    }

    public function testGetProductBySkuCode(): void
    {
        $product = Product::factory()->create(
            [
                'price' => 349.9,
                'published' => true,
            ]
        );

        $response = $this->get('/products/api/products/' . $product->sku_code);

        $responseContent = json_decode($response->content());
        $productBySkuCodeResponseObjectData = $responseContent->data;

        $this->assertEquals(
            [
                'sku_code' => $product->sku_code,
                'name' => $product->name,
                'type' => $product->type,
                'condition' => $product->condition,
                'description_title' => $product->description_title,
                'description_text' => $product->description_text,
                'price' => $product->price,
                'published' => $product->published,
            ],
            [
                'sku_code' => $productBySkuCodeResponseObjectData->sku_code,
                'name' => $productBySkuCodeResponseObjectData->name,
                'type' => $productBySkuCodeResponseObjectData->type,
                'condition' => $productBySkuCodeResponseObjectData->condition,
                'description_title' => $productBySkuCodeResponseObjectData->description_title,
                'description_text' => $productBySkuCodeResponseObjectData->description_text,
                'price' => $productBySkuCodeResponseObjectData->price,
                'published' => $productBySkuCodeResponseObjectData->published,
            ]
        );
    }
}
