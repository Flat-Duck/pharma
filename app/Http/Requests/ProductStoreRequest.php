<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'file', 'max:5024'],
            'brand_id' => ['required', 'exists:brands,id'],
            'is_private' => ['boolean'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
}
