<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table = "theloai";
    protected $fillable = [
        'TheLoai',
        'TheLoai_slug',
    ];
    public function SanPham(){
        return $this->hasMany(SanPham::class,'TheLoai_ID','id');
    }
}
