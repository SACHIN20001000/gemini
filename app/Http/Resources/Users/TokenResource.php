<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource
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
            'message'=> 'Register Successfully',
            'status' => true,
            'data' => [
            // 'name' => $this->name,
            'email' => $this->email,
            'token' => $this->token
            ]
        ];
    }
}
