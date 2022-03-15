<?php

namespace Products\Application\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductSetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:40',
            'products.*' => 'required|integer',
        ];
    }
}
