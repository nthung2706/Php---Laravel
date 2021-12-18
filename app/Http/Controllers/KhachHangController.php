<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function __construct()
    {
    $this->middleware('khachhang');
    }
   
    public function getHome(){
        return view('index');
    }
}
