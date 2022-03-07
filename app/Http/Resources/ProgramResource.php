<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
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
            'nama_program'=>$this->nama_program,
            'status_mbkm'=>$this->status_mbkm,
            'deskripsi'=>$this->deskripsi,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
