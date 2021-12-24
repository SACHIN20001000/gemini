<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Products\ProductCategoryResource;
use App\Http\Resources\Products\ProductStoreResource;
use App\Http\Resources\Products\ProductVariationsResource;
use App\Http\Resources\Products\ProductGalleryResource;
use App\Http\Resources\Products\ProductAttributesResource;
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
            'name' => $this->productName,
            'sku' => $this->sku,
            'category' => new ProductCategoryResource($this->category),
            'store' => new ProductStoreResource($this->store),
            'variations' => ProductVariationsResource::collection($this->productVariation),
            'gallary' =>  ProductGalleryResource::collection($this->productGallery),
            'attributes' => ProductAttributesResource::collection($this->variationAttributesValue),
            'status' => $this->status,
            'weight' => $this->weight,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'real_price' => $this->real_price,
            'sale_price' => $this->sale_price,
            'feature_image' => $this->feature_image           
                               
        ];
    }
}
