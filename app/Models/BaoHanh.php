<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoHanh extends Model
{
    use HasFactory;

    protected $table = "baohanh";
    public function SanPham(){
        return $this->hasMany(SanPham::class,'BaoHanh_ID','id');
    }

}
