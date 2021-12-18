<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrang extends Model
{
    use HasFactory;
    protected $table = "tinhtrang";
    public function DatHang(){
    return $this->hasMany(DatHang::class,'TinhTrang_ID','id');
}
}
