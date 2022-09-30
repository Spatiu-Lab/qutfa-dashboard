<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'email'         => ['required', 'email', Rule::unique('users')->ignore(auth()->user()->id)],
            'name'          => 'required|string',
            'phone'         => ['required', 'string', Rule::unique('users')->ignore(auth()->user()->id)],
            'password'      => 'nullable',
        ];
    }
}
