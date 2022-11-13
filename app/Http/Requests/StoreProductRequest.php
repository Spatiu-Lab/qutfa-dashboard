<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => ['required', 'max:100'],
            'status.*'      => ['required', 'string', Rule::in(Product::STATUS)],
            'description'   => ['required', 'string'],
            'category_id'   => ['required', 'integer', 'exists:categories,id'],
            'image'         => ['required', 'image','mimes:png,jpg'],
            'prices'        => ['required', 'array'],
            'discount'      => ['sometimes', 'array'],
        ];
    }
}
