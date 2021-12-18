<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaoHanh;
use Illuminate\Support\Facades\DB;

class BaoHanhController extends Controller
{
    public function getDanhSach()
    {

        $baohanh = baohanh::all();
        return view('Admin.baohanh.index', compact('baohanh'));
        
    }
    public function getThem()
    {
        return view('Admin.baohanh.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'baohanh' => ['required','max:2', 'unique:baohanh'],
        ]);
        $orm = new baohanh();
        $orm->baohanh = $request->baohanh;
        $orm->save();
        return redirect()->route('baohanh');
    }
    public function getSua(Request $request, $id)
    {
        $baohanh = baohanh::find($id);
        return view('Admin.baohanh.details', compact('baohanh'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'baohanh' => ['required','max:2', 'unique:baohanh,baohanh,' . $request->id],
        ]);
        $orm = baohanh::find($request->id);
        $orm->baohanh = $request->baohanh;
        $orm->save();
        return redirect()->route('baohanh');
    }
    public function getXoa($id)
    {
        $orm = baohanh::find($id);
        $orm->delete();
        return redirect()->route('baohanh');
    }
}
