<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'price'          => 'required|array',
            'quantity'       => 'required|array',
            'product_id'     => 'required|array',

            'total'     => ['required', 'string'],
            'address'   => ['required', 'string'],
            'phone'     => ['required', 'string'],
        ];
    }
}

