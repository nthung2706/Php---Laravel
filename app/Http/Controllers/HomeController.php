<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\NhaSanXuat;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\DatHang;
use App\Models\DatHangChiTiet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
    }
    public function index()
    {
        $sanpham = sanpham::where('HienThi',1)->paginate(12);
        $nhasanxuat = nhasanxuat::all();
        return view('frontend.index', compact('sanpham', 'nhasanxuat'));
    }
    public function getChiTiet($TenSanPham_slug)
    {
        $sanpham = sanpham::where('TenSanPham_slug', $TenSanPham_slug)->first();
        return view('frontend.product-details', compact('sanpham'));
    }
    public function getGioHang()
    {
        if (Cart::count() <= 0) {
            return view('frontend.cart_null');
        } else {
            return view('frontend.cart');
        }
    }
    public function getGioHang_Them($TenSanPham_slug)
    {
        $sanpham = sanpham::where('TenSanPham_slug', $TenSanPham_slug)->first();
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->TenSanPham,
            'price' => $sanpham->GiaBan,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $sanpham->HinhAnh,
                'discount' => $sanpham->GiamGia
            ]
        ]);
        return redirect()->route('home.giohang');
    }
    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);
        return redirect()->route('home.giohang');
    }
    public function getGioHang_XoaTatCa()
    {
        Cart::destroy();
        return redirect()->route('home.giohang');
    }

    public function getGioHang_Giam($row_id)
    {
        $row = Cart::get($row_id);
        if ($row->qty > 1) {
            Cart::update($row_id, $row->qty - 1);
        }
        return redirect()->route('home.giohang');
    }
    public function getGioHang_Tang($row_id)
    {
        $row = Cart::get($row_id);
        if ($row->qty < 10) {
            Cart::update($row_id, $row->qty + 1);
        }
        return redirect()->route('home.giohang');
    }
    public function getDat_Hang()
    {
        return view('frontend.checkout');
    }

    public function getDat_HangThanhCong()
    {
        Cart::destroy();
        return view('frontend.checkout_success');
    }

    public function postDat_Hang(Request $request)
    {
        $this->validate($request, [
            'DiaChi' => ['required', 'max:255'],
            'SDT' => ['required', 'max:11'],
        ]);
        $dh = new DatHang();
        $dh->NguoiDung_ID = Auth::user()->id;
        $dh->TinhTrang_ID = $request->TinhTrang_ID;
        $dh->diachi = $request->diachi;
        $dh->sdt = $request->sdt;
        $dh->save();
        foreach (Cart::content() as $value) {
            $ct = new DatHangChiTiet();
            $ct->donhang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->SoLuongMua = $value->qty;
            $ct->DonGiaBan = $value->price;
        }
        return redirect()->route('home.dat-hang.thanh-cong');
    }
}
