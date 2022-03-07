<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_id','nama_paket_program','section_id','jadwal_id_utama','semester_id','deleted_at','created_at','updated_at'
    ];

    public function section() {
        return $this->belongsToMany('App\Models\Section','mbkm_package_relations');
    }
}
