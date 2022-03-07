<?php

namespace App\Http\Resources;

use App\Models\Program;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Semester;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $semester = Semester::find($this->semester_id);
        $program = Program::find($this->program_id);
        $jadwal = Section::find($this->section_id);

        return[
            'id'=>$this->id,
            'program_id'=>$program,
            'nama_paket_program'=>$this->nama_paket_program,
            'section_id'=>$jadwal,
            'semester_id'=>$semester,
            'deleted_at'=>$this->deleted_at,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at

        ];
    }
}
