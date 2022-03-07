<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_program','status_mbkm','deskripsi','deleted_at','created_at','updated_at'
    ];

    

}
