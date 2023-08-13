<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrderdetails extends FormRequest
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
            'order_id' => 'required|int',
            'product_id' => 'required|int',
            'quantity' => 'required|int',
            'total' => 'required|int',
             
        ];
    }

    public function messages()
    {
        return  [
                'order_id.required' => 'Vui lòng không được để trống',
                'product_id.required' => 'Vui lòng không được để trống',
                'quantity.required' => 'Vui lòng không được để trống',           
                'total.required' => 'Vui lòng không được để trống',           
                
            ];
    }
}
