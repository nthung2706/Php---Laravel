<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatHangChiTiet extends Model
{
    use HasFactory;
    protected $table = "dathang_chitiet";
    public function DatHang()
    {
        return $this->belongsTo(DatHang::class, 'DatHang_ID', 'id');
    }
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'SanPham_ID', 'id');
    }

}
