<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
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
            'product_id' => $this->product_id,
            'variation_id' => $this->variation_id,
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
            'product' => $this->products,
            'variationProduct' => $this->variationProduct,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
                   
        ];
    }
}
