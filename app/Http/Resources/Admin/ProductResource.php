<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'slug' => $this->slug,
            'sku' => $this->sku,
            'category' => $this->categories->name,
            'category id ' => $this->categories->id,

            'feature image' => $this->feature_image,
            
            'status' => $this->status,
            'weight' => $this->weight,
            'description' => $this->description,
            
            'quantity' => $this->quantity,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'featured' => $this->featured,

            'created' => $this->created_at,
            'updated_at' => $this->updated_at,
           
                               
        ];
    }
}
