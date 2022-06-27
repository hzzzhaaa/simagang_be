<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MbkmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'package_id'=>$this->package_id,
            'section_id'=>$this->section_id,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
