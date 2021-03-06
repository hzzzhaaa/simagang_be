<?php

namespace App\Http\Resources;

use App\Models\Package;
use App\Models\Section;
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
        $packages = Package::find($this->package_id);
        $section = Section::find($this->section_id);
        return[
            'id'=>$this->id,
            'package_id'=>$packages,
            'section_id'=>$section,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
