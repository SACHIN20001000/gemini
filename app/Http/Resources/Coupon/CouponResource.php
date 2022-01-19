<?php

namespace App\Http\Resources\Coupon;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'type' => $this->type,
            'apply_to' => $this->apply_to,
            'count' => $this->count,
            'expired_at' => $this->expired_at,



            'category_id' => $this->category_id,
            'product_id' => $this->product_id,
            'value' => $this->value,



        ];
    }
}
