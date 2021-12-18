<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NguoiDungController extends Controller
{
    public function getDanhSach()
    {
  
        $nguoidung = nguoidung::all();
        return view('Admin.nguoidung.index', ['nguoidung' => $nguoidung]);
      
    }
    public function getThem()
    {
        return view('Admin.nguoidung.create');
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
            'chucvu' => ['required'],
        ]);
        $orm = new nguoidung();
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->password = Hash::make($request->password);
        $orm->chucvu = $request->chucvu;
        $orm->save();
        return redirect()->route('nguoidung');
    }
    public function getSua(Request $request, $id)
    {
        $nguoidung = nguoidung::find($id);
        return view('Admin.nguoidung.details', compact('nguoidung'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung,email,' . $request->id],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
            'chucvu' => ['required'],
        ]);
        $orm = nguoidung::find($request->id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->password = Hash::make($request->password);
        $orm->chucvu = $request->chucvu;
        $orm->save();
        return redirect()->route('nguoidung');
    }
    public function getXoa($id)
    {
        $orm = nguoidung::find($id);
        $orm->delete();
        return redirect()->route('nguoidung');
    }
}
