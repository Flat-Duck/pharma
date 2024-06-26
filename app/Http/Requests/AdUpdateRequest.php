<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdUpdateRequest extends FormRequest
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
            'title' => ['required', 'max:255', 'string'],
            'body' => ['required', 'max:255', 'string'],
            'offer' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image'],
            'product_id' => ['required', 'exists:products,id'],
        ];
    }
}
