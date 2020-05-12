<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'         => $this->id,
            'phone'      => $this->phone,
            'name'       => $this->name,
            'email'      => $this->email,
            'created_at' => $this->created_at,
        ];
    }
}
