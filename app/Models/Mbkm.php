<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbkm extends Model
{
    public $table = "mbkm_package_relations";
    use HasFactory;
    protected $fillable = [
        'package_id','section_id','deleted_at','created_at','updated_at'
    ];

    public function get_packagesid($id)
    {
        $package_id = Mbkm::where('package_id',$id);
        return $package_id;
    }

}
