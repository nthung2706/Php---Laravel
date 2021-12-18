<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoiSanXuat;
use Illuminate\Support\Facades\DB;

class NoiSanXuatController extends Controller
{
    public function getDanhSach()
    {

        $noisanxuat = noisanxuat::all();
        return view('Admin.noisanxuat.index', compact('noisanxuat'));

    }
    public function getThem()
    {
        return view('Admin.noisanxuat.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'noisanxuat' => ['required','string','max:255', 'unique:noisanxuat'],
        ]);
        $orm = new noisanxuat();
        $orm->noisanxuat = $request->noisanxuat;
        $orm->save();
        return redirect()->route('noisanxuat');
    }
    public function getSua(Request $request, $id)
    {
        $noisanxuat = noisanxuat::find($id);
        return view('Admin.noisanxuat.details', compact('noisanxuat'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'noisanxuat' => ['required','string','max:255', 'unique:noisanxuat,noisanxuat,' . $request->id],
        ]);
        $orm = noisanxuat::find($request->id);
        $orm->noisanxuat = $request->noisanxuat;
        $orm->save();
        return redirect()->route('noisanxuat');
    }
    public function getXoa($id)
    {
        $orm = noisanxuat::find($id);
        $orm->delete();
        return redirect()->route('noisanxuat');
    }
}
