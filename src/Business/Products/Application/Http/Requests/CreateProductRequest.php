<?php

namespace Products\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Products\Domain\Model\Product;

class CreateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sku_code' => 'required|max:8',
            'name' => 'string|required|max:40',
            'type' => Rule::in(Product::PRODUCT_TYPES),
            'condition' => Rule::in(Product::PRODUCT_CONDITIONS),
            'description_title' => 'string|required',
            'description_text' => 'string|required',
            'price' => 'numeric|required',
            'published' => 'boolean|required',
        ];
    }
}
