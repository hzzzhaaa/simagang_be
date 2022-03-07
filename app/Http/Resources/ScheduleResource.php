<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'nama_kegiatan'=>$this->nama_kegiatan,
            'mulai_kegiatan'=>$this->mulai_kegiatan,
            'selesai_kegiatan'=>$this->selesai_kegiatan,
            'kode_prodi'=>$this->kode_prodi,
            'status'=>$this->status,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
