<?php

namespace App\Http\Resources\Products;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Products\TagsResource;
use App\Http\Resources\Products\BackendTagsResource;
class SolutionhubProductResource extends JsonResource
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
            'separation_anxiety' => $this->separation_anxiety,
            'teething' => $this->teething,
            'aggressive_chewers' => $this->aggressive_chewers,

            
            'boredom' => $this->boredom,
            'disabled' => $this->disabled,
            'status' => $this->status,
            'description' => $this->description,
            'energetic' => $this->energetic,
            'feature_image' => $this->feature_image ?? '',
            'tags'=>$this->tags?TagsResource::collection($this->tags):null,
            'backend_tags'=>$this->backendtags?BackendTagsResource::collection($this->backendtags):null,
        ];
    }


}
