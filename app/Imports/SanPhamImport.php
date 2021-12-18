<?php

namespace App\Imports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SanPhamImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new SanPham([
            'nguoidung_id' => $row['nguoidung_id'],
            'theloai_id' => $row['theloai_id'],
            'nhasanxuat_id' => $row['nhasanxuat_id'],
            'noisanxuat_id' => $row['noisanxuat_id'],
            'baohanh_id' => $row['baohanh_id'],
            'tensanpham' => $row['tensanpham'],
            'giamgia' => $row['giamgia'],
            'tensanpham_slug' => $row['tensanpham_slug'],
            'namsanxuat' => $row['namsanxuat'],
            'giaban' => $row['giaban'],
            'gianhap' => $row['gianhap'],
            'soluong' => $row['soluong'],
            'thongsosanpham' => $row['thongsosanpham'],
            'chitiet' => $row['chitiet'],
            'hinhanh' => $row['hinhanh'],
            'hienthi' => $row['hienthi'],
        ]);
    }

}
