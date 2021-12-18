<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements
    FromCollection,
    WithHeadings,
    WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */


    public function headings(): array
    {
        return [
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
    }
    public function map($row): array
    {
        return [
            $row->NguoiDung_ID,
            $row->TheLoai_ID,
            $row->NhaSanXuat_ID,
            $row->NoiSanXuat_ID,
            $row->BaoHanh_ID,
            $row->TenSanPham,
            $row->GiamGia,
            $row->TenSanPham_slug,
            $row->NamSanXuat,
            $row->GiaBan,
            $row->GiaNhap,
            $row->SoLuong,
            $row->ThongSoSanPham,
            $row->ChiTiet,
            $row->HinhAnh,
            $row->HienThi,
        ];
    }

    public function collection()
    {
        return SanPham::all();
    }
}
