<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
            'slug' => 'required|string|max:255',
            'price' => 'required|string',
            'description' => 'required|string',
            'quantity' => 'required|int ',
            'status' => 'required|int',
            // 'image' => 'required|string', 
            'category_id' => 'required|int',

        ];
    }

    public function messages()
    {
        return  [
                'name.required' => 'Vui lòng không được để trống',
                'slug.required' => 'Vui lòng không được để trống',
                'price.required' => 'Vui lòng không được để trống',           
                'description.required' => 'Vui lòng không được để trống',           
                'quantity.required' => 'Vui lòng không được để trống',           
                'status.required' => 'Vui lòng không được để trống',           
                // 'image.required' => 'Vui lòng không được để trống',           
                'category_id.required' => 'Vui lòng không được để trống',           
            ];
    }
}
