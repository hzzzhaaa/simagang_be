<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = "student_package_relations";
    use HasFactory;
    protected $fillable = [
        'package_id','nim','nama_mahasiswa','deleted_at','created_at','updated_at'
    ];
}
