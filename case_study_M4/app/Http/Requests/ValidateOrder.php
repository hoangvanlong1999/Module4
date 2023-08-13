<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateOrder extends FormRequest
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
            'order_date' => 'required|string|max:255',
            'delivery_date' => 'required|string',
            'total_amount' => 'required|string',
            'note' => 'required|string',
            'customer_id' => 'required|int ',
        ];
    }


    public function messages()
    {
        return  [
                'order_date.required' => 'Vui lòng không được để trống',
                'delivery_date.required' => 'Vui lòng không được để trống',
                'total_amount.required' => 'Vui lòng không được để trống',           
                'note.required' => 'Vui lòng không được để trống',           
                'customer_id.required' => 'Vui lòng không được để trống',           
                          
            ];
    }
}
