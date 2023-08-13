<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateCreateUsers extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return  [
                'name.required' => 'Vui lòng không được để trống',
                'email.required' => 'Vui lòng không được để trống',
                'password.required' => 'Vui lòng không được để trống',           
            ];
    }
}
