<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TheLoai;
use Illuminate\Support\Str;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
  
        $theloai = theloai::all();
        return view('Admin.theloai.index', compact('theloai'));
        
    }
    public function getThem()
    {
        return view('Admin.theloai.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'theloai' => ['required','string','max:255', 'unique:theloai'],
        ]);
        $orm = new theloai();
        $orm->theloai = $request->theloai;
        $orm->theloai_slug = Str::slug($request->theloai, '-');
        $orm->save();
        return redirect()->route('theloai');
    }
    public function getSua(Request $request, $id)
    {
        $theloai = theloai::find($id);
        return view('Admin.theloai.details', compact('theloai'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'theloai' => ['required','string','max:255', 'unique:theloai,theloai,' .$request->id],
        
        ]);
        $orm = theloai::find($request->id);
        $orm->theloai = $request->theloai;
        $orm->theloai_slug = Str::slug($request->theloai, '-');
        $orm->save();
        return redirect()->route('theloai');
    }
    public function getXoa($id)
    {
        $orm = theloai::find($id);
        $orm->delete();
        return redirect()->route('theloai');
    }
}
