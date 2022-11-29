<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer',
            'name' => 'required|alpha',
            'description' => 'required|alpha',
            'price' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => '未填寫ID',
            'id.integer' => 'ID必須為整數',
            'name.required' => '未填寫商品名稱',
            'name.alpha' => '商品名稱必須為文字',
            'description.required' => '未填寫商品敘述',
            'description.alpha' => '商品敘述必須為文字',
            'price.required' => '未填寫商品價格',
            'price.integer' => '商品價格必須為整數',
            'price.min' => '商品價格必須大於0',
        ];
    }
}