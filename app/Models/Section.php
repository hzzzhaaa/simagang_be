<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_mk','nama_mk','sks','dosen','lokasi','hari','jam','created_at','updated_at'
    ];

    public function package(){
        return $this->belongsToMany('App\Models\Package','mbkm_package_relations');
    }
}
