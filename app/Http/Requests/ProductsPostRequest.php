<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsPostRequest extends FormRequest
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
            'name'   => 'required|unique:products|min:3|max:40',
            'sku'   => 'required|unique:products|min:8|max:8',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages() {
		return [
            'name.required'   => 'Campo Nome é obrigatório.',
            'name.unique'     => 'Este Nome já está cadastrado.',
            'name.min'        => 'O campo Nome precisa no mínimo de caracteres.(Min. 3)',
            'name.max'        => 'O campo Nome atingiu número máximo de caracteres.(Max. 40)',
            'sku.required'   => 'Campo SKU é obrigatório.',
            'sku.unique'     => 'Este SKU já está cadastrado.',
            'sku.min'        => 'O campo SKU precisa no mínimo de caracteres.(Min. 8)',
            'sku.max'        => 'O campo SKU atingiu número máximo de caracteres.(Max. 8)',
		];
	}
}
