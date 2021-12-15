<?php

namespace App\Http\Requests\Admin\Product;

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
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'type' => 'required',

            // 'quantity' => 'required',
            // 'weight' => 'required',
            // 'price' => 'required',
            // 'sale_price' => 'required',
          
            // 'featured' => 'required',
            // 'sku' => 'required',
            // 'feature_image' =>'required'

        ];
    }
}
