<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatHang;
use App\Models\Nguoidung;
use App\Models\Tinhtrang;


class DatHangController extends Controller
{
    public function getDanhSach(){
        $dathang = dathang::all();
        return view('Admin.dathang.index',compact('dathang'));
    }
    public function getThem(){
        $nguoidung = nguoidung::all();
        $tinhtrang = tinhtrang::all();        
        return view('Admin.dathang.create',compact('nguoidung','tinhtrang'));
    }
    public function postThem(Request $request){
        $this->validate($request, [
            'nguoidung_id' => ['required'],
            'tinhtrang_id' => ['required'],
            'sdt' => ['required',' max:11'],
            'diachi' => ['required', 'string','max:255'],
        ]);
        $orm = new dathang();
        $orm->nguoidung_id = $request->nguoidung_id;
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->sdt = $request->sdt;
        $orm->diachi = $request->diachi;
        $orm->save();
        return redirect()->route('donhang');
    }
    public function getSua(Request $request, $id){
        $dathang = dathang::find($id);
        $nguoidung = nguoidung::all();
        $tinhtrang = tinhtrang::all();
        return view('Admin.dathang.details',compact('dathang','nguoidung' ,'tinhtrang'));
    }
    public function postSua(Request $request, $id){
        $this->validate($request, [
            'nguoidung_id' => ['required'],
            'tinhtrang_id' => ['required'],
            'sdt' => ['required',' max:11'],
            'diachi' => ['required', 'string','max:255'],
        ]);
        $orm =  dathang::find($request->id);
        $orm->nguoidung_id = $request->nguoidung_id;
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->sdt = $request->sdt;
        $orm->diachi = $request->diachi;
        $orm->save();
        return redirect()->route('donhang.sua');
    }
    public function getXoa($id){
        $orm = dathang::find($id);
        $orm->delete();
        return redirect()->route('donhang');
    }
}
