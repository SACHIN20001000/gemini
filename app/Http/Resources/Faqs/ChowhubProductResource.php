<?php

namespace App\Http\Resources\Faqs;

use Illuminate\Http\Resources\Json\JsonResource;


use App\Models\VariationAttribute;

class ChowhubProductResource extends JsonResource
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
            'name' => $this->productName,
            'feature_image' => $this->feature_image,
        ];
    }



}
