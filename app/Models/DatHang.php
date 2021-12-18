<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatHang extends Model
{
    use HasFactory;
    protected $table = "dathang";
    public function DatHangChiTiet()
    {
        return $this->hasMany(DatHangChiTiet::class, 'DatHang_ID', 'id');
    }
    public function NguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'NguoiDung_ID', 'id');
    }
    public function TinhTrang()
    {
        return $this->belongsTo(TinhTrang::class, 'TinhTrang_id', 'id');
    }
}
