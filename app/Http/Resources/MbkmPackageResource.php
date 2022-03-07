<?php

namespace App\Http\Resources;

use App\Models\Package;
use App\Models\Program;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Resources\Json\JsonResource;

class MbkmPackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $package = Package::find($this->program_id);
        $jadwal = Section::find($this->section_id);

        return[
            'id'=>$this->id,
            'package_id'=>$package,
            'section_id'=>$jadwal,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
