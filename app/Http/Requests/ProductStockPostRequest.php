<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStockPostRequest extends FormRequest
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
            'product_id'   => 'required',
            'count'   => 'required|numeric',
            'is_sum'   => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
		return [
            'product_id.required' => 'Campo Produto é obrigatório.',
            'count.required'  => 'Campo Quantidade é obrigatório.',
            'count.numeric'   => 'Campo Quantidade precisa ser um número.',
            'is_sum.required' => 'Campo Estoque é obrigatório.',
		];
	}
}
