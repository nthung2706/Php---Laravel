<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\NguoiDung;
use App\Models\TheLoai;
use App\Models\NhaSanXuat;
use App\Models\NoiSanXuat;
use App\Models\BaoHanh;
use App\Models\GiamGia;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = sanpham::all();
        return view('Admin.sanpham.index', compact('sanpham'));
    }
    public function getThem()
    {
        $nguoidung = NguoiDung::all();
        $theloai = TheLoai::all();
        $nhasanxuat = NhaSanXuat::all();
        $noisanxuat = NoiSanXuat::all();
        $baohanh = BaoHanh::all();
        return view('Admin.sanpham.create', compact('nguoidung', 'theloai', 'nhasanxuat', 'noisanxuat', 'baohanh'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nguoidung_id' => ['required'],
            'theloai_id' => ['required'],
            'nhasanxuat_id' => ['required'],
            'noisanxuat_id' => ['required'],
            'baohanh_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:255', 'unique:sanpham'],
            'giamgia' => ['required','min:2'],
            'namsanxuat' => ['required', 'date'],
            'giaban' => ['required'],
            'gianhap' => ['required'],
            'soluong' => ['required', 'max:6'],
            'thongsosanpham' => ['required'],
            'chitiet' => ['required'],
            'hienthi' => ['required'],
            'hinhanh' => ['required', 'image'],
        ]);

                		// Kiểm tra tập tin rỗng hay không?
		$path = '';
		if($request->hasFile('hinhanh'))
		{
			// Tạo thư mục nếu chưa có
			$lsp = theloai::find($request->theloai_id);
			File::isDirectory($lsp->TheLoai_slug) or Storage::makeDirectory($lsp->TheLoai_slug, 0775);
			
			// Xác định tên tập tin
			$extension = $request->file('hinhanh')->extension();
			$filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
			
			// Upload vào thư mục và trả về đường dẫn
			$path = Storage::putFileAs($lsp->TheLoai_slug, $request->file('hinhanh'), $filename);
		}
        $orm = new sanpham();
        $orm->nguoidung_id = $request->nguoidung_id;
        $orm->theloai_id = $request->theloai_id;
        $orm->nhasanxuat_id = $request->nhasanxuat_id;
        $orm->noisanxuat_id = $request->noisanxuat_id;
        $orm->baohanh_id = $request->baohanh_id;
        $orm->giamgia = $request->giamgia;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->namsanxuat = $request->namsanxuat;
        $orm->giaban = $request->giaban;
        $orm->gianhap = $request->gianhap;
        $orm->soluong = $request->soluong;
        $orm->thongsosanpham = $request->thongsosanpham;
        $orm->chitiet = $request->chitiet;
        $orm->hienthi = $request->hienthi;
        if(!empty($path)) $orm->hinhanh = $path;

        $orm->save();
        return redirect()->route('sanpham');
    }
    public function getSua(Request $request, $id)
    {
        $sanpham = SanPham::find($id);
        $nguoidung = NguoiDung::all();
        $theloai = TheLoai::all();
        $nhasanxuat = NhaSanXuat::all();
        $noisanxuat = NoiSanXuat::all();
        $baohanh = BaoHanh::all();
        return view('Admin.sanpham.details', compact('sanpham', 'nguoidung', 'theloai', 'nhasanxuat', 'noisanxuat', 'baohanh'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'nguoidung_id' => ['required'],
            'theloai_id' => ['required'],
            'nhasanxuat_id' => ['required'],
            'noisanxuat_id' => ['required'],
            'baohanh_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:255', 'unique:sanpham,TenSanPham,' . $request->id],
            'giamgia' => ['required','min:2'],
            'namsanxuat' => ['required', 'date'],
            'giaban' => ['required'],
            'gianhap' => ['required'],
            'soluong' => ['required', 'max:6'],
            'thongsosanpham' => ['required'],
            'chitiet' => ['required'],
            'hienthi' => ['required'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);
		
		// Kiểm tra tập tin rỗng hay không?
		$path = '';
		if($request->hasFile('hinhanh'))
		{
			// Xóa tập tin cũ
			$sp = SanPham::find($id);
			Storage::delete($sp->HinhAnh);
			
			// Xác định tên tập tin mới
			$extension = $request->file('hinhanh')->extension();
			$filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
			
			// Upload vào thư mục và trả về đường dẫn
			$lsp = TheLoai::find($request->theloai_id);
			$path = Storage::putFileAs($lsp->TheLoai_slug, $request->file('hinhanh'), $filename);
		}

        $orm =  sanpham::find($request->id);
        $orm->nguoidung_id = $request->nguoidung_id;
        $orm->theloai_id = $request->theloai_id;
        $orm->nhasanxuat_id = $request->nhasanxuat_id;
        $orm->noisanxuat_id = $request->noisanxuat_id;
        $orm->baohanh_id = $request->baohanh_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->giamgia = $request->giamgia;
        $orm->namsanxuat = $request->namsanxuat;
        $orm->giaban = $request->giaban;
        $orm->gianhap = $request->gianhap;
        $orm->soluong = $request->soluong;
        $orm->thongsosanpham = $request->thongsosanpham;
        $orm->chitiet = $request->chitiet;
        $orm->hienthi = $request->hienthi;
		if(!empty($path)) $orm->hinhanh = $path;
        $orm->save();
        return redirect()->route('sanpham');
    }
    public function getXoa($id)
    {
		$orm = SanPham::find($id);
		$orm->delete();
		
		// Xóa tập tin khi xóa sản phẩm
		Storage::delete($orm->HinhAnh);
        return redirect()->route('sanpham');
    }
    public function getDetails($id)
    {
        return sanpham::findOrFail($id);
    }
    public function postNhap(Request $request)
    {
        Excel::import(new SanPhamImport, $request->file('file_excel'));
        return redirect()->route('sanpham');
    }
    public function getXuat()
    {
        return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
    }
}
