<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'الرجاء ادخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف غير صالح',
            'password.required' => 'الرجاء ادخال كلمة المرور'
        ];
    }
}
