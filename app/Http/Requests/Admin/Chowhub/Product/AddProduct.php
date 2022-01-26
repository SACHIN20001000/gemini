<?php

namespace App\Http\Requests\Admin\Chowhub\Product;

use Illuminate\Foundation\Http\FormRequest;

class AddProduct extends FormRequest
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
            'productName' => 'required',
            'category_id' => 'required',
            'store_id' => 'required',
            'status' => 'required',
            'weight' => 'required',
            'real_price' => 'required',
            'sale_price' => 'required',
            'sku' => 'required',
            'qty' => 'required',



        ];
    }
}
