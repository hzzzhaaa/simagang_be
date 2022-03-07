<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            'kode_mk'=>$this->kode_mk,
            'nama_mk'=>$this->nama_mk,
            'sks'=>$this->sks,
            'dosen'=>$this->dosen,
            'lokasi'=>$this->lokasi,
            'hari'=>$this->hari,
            'jam'=>$this->lokasi,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
