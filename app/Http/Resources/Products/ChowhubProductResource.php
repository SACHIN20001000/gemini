<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Products\ProductCategoryResource;
use App\Http\Resources\Products\ProductStoreResource;
use App\Http\Resources\Products\ProductVariationsResource;
use App\Http\Resources\Products\ProductGalleryResource;
use App\Http\Resources\Products\ProductAttributesResource;
use App\Http\Resources\Products\TagsResource;
use App\Http\Resources\Products\ProductDescriptionImageResource;

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
            'sku' => $this->sku,
            'type' => $this->type,
            'category' => new ProductCategoryResource($this->category),
            'store' => new ProductStoreResource($this->store),
            'variations' => ProductVariationsResource::collection($this->productVariation),
            'gallary' =>  ProductGalleryResource::collection($this->productGallery),
            'description_image' =>  ProductDescriptionImageResource::collection($this->productDescriptionImage) ,

            'attributes' => ProductAttributesResource::collection($this->variationAttributesValue),
            'tags'=>$this->tags?TagsResource::collection($this->tags):null,
            'status' => $this->status,
            'weight' => $this->weight,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'real_price' => $this->real_price,
            'sale_price' => $this->sale_price,
            'feature_image' => $this->feature_image,
            'variation_attributes'=>  $this->getAttributeByProduct($this->id)       
                               
        ];
    }


    public function getAttributeByProduct($id)
    {
      $attributes = VariationAttribute::whereHas('variationAttributeName', function ($query) use ($id) {
    return $query->where('product_id', '=', $id);
})->get();

return  AttributesResource::collection($attributes);
    }
}
