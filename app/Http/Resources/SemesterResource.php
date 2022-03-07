<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SemesterResource extends JsonResource
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
            'nama_semester'=>$this->nama_semester,
            'status'=>$this->status,
            'periode'=>$this->periode,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
