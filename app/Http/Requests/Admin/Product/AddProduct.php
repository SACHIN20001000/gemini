<?php

namespace App\Http\Requests\Admin\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class AddCoupon extends FormRequest
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
             'CouponName' => 'required',
             'description' => 'required',
             'category_id' => 'required',
             'store_id' => 'required',
             'status' => 'required',
            // // 'attributes["name"]' => 'required',
            // // 'attributes["value"]' => 'required',
            // 'weight' => 'required',
            // 'real_price' => 'required',
            // 'sale_price' => 'required',
             'sku' => 'required',
            // 'qty' => 'required',
            // 'variations["Qty"]' => 'required',
            // 'variations["Regular Price"]' => 'required',
            // 'variations["Sale Price"]' => 'required',
            // 'variations["Sku"]' => 'required',
            // 'variations["Image"]' => 'required',


        ];
    }
}
