<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan','mulai_kegiatan','selesai_kegiatan','kode_prodi','status','deleted_at','created_at','updated_at'
    ];
}
