<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NhaSanXuatController extends Controller
{
    public function getDanhSach()
    {
        $nhasanxuat = nhasanxuat::all();
        return view('Admin.nhasanxuat.index', compact('nhasanxuat'));
    }
    public function getThem()
    {
        return view('Admin.nhasanxuat.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nhasanxuat' => ['required', 'string', 'max:255', 'unique:nhasanxuat'],
            'hinhanh' => ['nullable','image','max:1024'],
        ]);
        // Upload hình ảnh
		$path = '';
		if($request->hasFile('hinhanh'))
		{
			$extension = $request->file('hinhanh')->extension();
			$filename = Str::slug($request->nhasanxuat, '-') . '.' . $extension;
			$path = Storage::putFileAs('nha-san-xuat', $request->file('hinhanh'), $filename);
		}

        $orm = new nhasanxuat();
        $orm->nhasanxuat = $request->nhasanxuat;
        $orm->nhasanxuat_slug = Str::slug($request->nhasanxuat, '-');
        if(!empty($path)) $orm->hinhanh = $path;
        
        $orm->save();
        return redirect()->route('nhasanxuat');
    }
    public function getSua( $id)
    {
        $nhasanxuat = nhasanxuat::find($id);
        return view('Admin.nhasanxuat.details', compact('nhasanxuat'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'nhasanxuat' => ['required', 'string', 'max:255', 'unique:nhasanxuat,nhasanxuat,' . $request->id],
            'hinhanh' => ['nullable','image','max:1024'],
        ]);
		// Upload hình ảnh
		$path = '';
		if($request->hasFile('hinhanh'))
		{
			// Xóa file cũ
			$orm = nhasanxuat::find($id);
			Storage::delete($orm->HinhAnh);



			// Upload file mới
			$extension = $request->file('hinhanh')->extension();
			$filename = Str::slug($request->nhasanxuat, '-') . '.' . $extension;
			$path = Storage::putFileAs('nha-san-xuat', $request->file('hinhanh'), $filename);
		}

        $orm = nhasanxuat::find($request->id);
        $orm->nhasanxuat = $request->nhasanxuat;
		$orm->nhasanxuat_slug = Str::slug($request->nhasanxuat, '-');
		if(!empty($path)) $orm->hinhanh = $path;
        
        $orm->save();
        return redirect()->route('nhasanxuat');
    }
    public function getXoa($id)
    {

		// Xóa
        $orm = nhasanxuat::find($id);
		$orm->delete();
		
		// Xoá hình ảnh khi xóa dữ liệu
		Storage::delete($orm->HinhAnh);
        return redirect()->route('nhasanxuat');
    }
}
