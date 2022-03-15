<?php

namespace Products\Application\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Products\Domain\Model\Product;

class ProductSetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'published' => $this->products->contains(function (Product $product) {
                return $product->published === true;
            }),
            'products' => ProductResource::collection($this->products),
        ];
    }
}

