<?php

namespace Products\Application\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sku_code' => $this->sku_code,
            'name' => $this->name,
            'type' => $this->type,
            'condition' => $this->condition,
            'description_title' => $this->description_title,
            'description_text' => $this->description_text,
            'price' => $this->price,
            'published' => $this->published,
        ];
    }
}
