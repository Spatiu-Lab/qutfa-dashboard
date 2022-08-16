<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'name' => 'nullable|string',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
            'bio' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'الرجاء ادخال  البريد الالكتروني',
            'email.email' => 'البريد الالكتروني غير صالح',
            'email.unique' => 'البريد الالكتروني غير صالح',
            'phone.required' => 'الرجاء ادخال رقم الهاتف',
            'phone.numeric' => 'رقم الهاتف غير صالح',
            'phone.unique' => 'رقم الهاتف غير صالح',
            'password.required' => 'الرجاء ادخال كلمة المرور',
            'password.confirmed' => 'كلمة المرور غير متطابقة',
            'avatar.image' => 'صورة الملف الشخصي غير صالحة',
        ];
    }
}
