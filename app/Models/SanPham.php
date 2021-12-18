<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = "sanpham";
    protected $fillable = [
        'NguoiDung_ID',
        'TheLoai_ID',
        'NhaSanXuat_ID',
        'NoiSanXuat_ID',
        'BaoHanh_ID	',
        'TenSanPham',
        'GiamGia',
        'TenSanPham_slug',
        'NamSanXuat',
        'GiaBan',
        'GiaNhap',
        'SoLuong',
        'ThongSoSanPham',
        'ChiTiet',
        'HinhAnh',
        'HienThi',
    ];
    public function DatHangChiTiet()
    {
        return $this->hasMany(DatHangChiTiet::class, 'SanPham_ID', 'id');
    }
    public function NguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'NguoiDung_ID', 'id');
    }
    public function TheLoai()
    {
        return $this->belongsTo(TheLoai::class, 'TheLoai_ID', 'id');
    }
    public function NhaSanXuat()
    {
        return $this->belongsTo(NhaSanXuat::class, 'NhaSanXuat_ID', 'id');
    }
    public function NoiSanXuat()
    {
        return $this->belongsTo(NoiSanXuat::class, 'NoiSanXuat_ID', 'id');
    }
    public function BaoHanh()
    {
        return $this->belongsTo(BaoHanh::class, 'BaoHanh_ID', 'id');
    }
}
