<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhTrang;
use Illuminate\Support\Facades\DB;

class TinhTrangController extends Controller
{
    public function getDanhSach()
    {

        $tinhtrang = tinhtrang::all();
        return view('Admin.tinhtrang.index', compact('tinhtrang'));
        
    }
    public function getThem()
    {
        return view('Admin.tinhtrang.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'tinhtrang' => ['required','string','max:255', 'unique:tinhtrang'],
        ]);
        $orm = new tinhtrang();
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();
        return redirect()->route('tinhtrang');
    }
    public function getSua(Request $request, $id)
    {
        $tinhtrang = tinhtrang::find($id);
        return view('Admin.tinhtrang.details', compact('tinhtrang'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tinhtrang' => ['required','string','max:255', 'unique:tinhtrang,tinhtrang,' . $request->id],
        ]);
        $orm = tinhtrang::find($request->id);
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();
        return redirect()->route('tinhtrang');
    }
    public function getXoa($id)
    {
        $orm = tinhtrang::find($id);
        $orm->delete();
        return redirect()->route('tinhtrang');
    }
}
