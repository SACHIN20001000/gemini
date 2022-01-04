<?php

namespace App\Http\Resources\Orders;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'product_name' => $this->product_name,
            'total_price' => $this->total_price,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'email' => $this->email,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'address' => $this->address,
            'country' => $this->country,
            'created_at' => $this->created_at,

            
           
                               
        ];
    }
}
