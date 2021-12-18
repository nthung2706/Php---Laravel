<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    use HasFactory;
    protected $table = "nhasanxuat";
    protected $fillable = [
        'NhaSanXuat',
        'HinhAnh',
    ];
    public function SanPham(){
        return $this->hasMany(SanPham::class,'NhaSanXuat_ID','id');
    }
}
