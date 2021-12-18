<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\NoiSanXuatController;
use App\Http\Controllers\BaoHanhController;
use App\Http\Controllers\DatHangController;
use App\Http\Controllers\GiamGiaController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\SanPhamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::prefix('Khach-hang')->group(function(){
    Route::get('/',[KhachHangController::class,'getHome'])->name('khachhang');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

//giỏ hàng
Route::get('/chitiet-sanpham/{TenSanPham_slug}', [HomeController::class, 'getChiTiet'])->name('home.chitiet');
Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('home.giohang');
Route::post('/gio-hang/{TenSanPham_slug}', [HomeController::class, 'getGioHang_Them'])->name('home.giohang.them');
Route::get('/gio-hang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('home.giohang.xoaTatCa');
Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('home.giohang.xoa');
Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('home.giohang.giam');
Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('home.giohang.tang');
// đặt hàng
Route::get('/thanh-toan',[HomeController::class, 'getDat_Hang'])->name('home.dat-hang');
Route::get('/thanh-toan-thanh-cong',[HomeController::class, 'getDat_HangThanhCong'])->name('home.dat-hang.thanh-cong');
Route::post('/thanh-toan',[HomeController::class, 'postDat_Hang'])->name('home.dat-hang');





Route::prefix('admin')->middleware('auth','admin')->group(function(){
    Route::get('/', [AdminController::class, 'getAdmin'])->name('admin');
// Người dùng
Route::get('/nguoidung',[NguoiDungController::class,'getDanhSach'])->name('nguoidung');
Route::get('/nguoidung/them',[NguoiDungController::class,'getThem'])->name('nguoidung.them');
Route::post('/nguoidung/them',[NguoiDungController::class,'postThem'])->name('nguoidung.them');
Route::get('/nguoidung/sua/{id}',[NguoiDungController::class,'getSua'])->name('nguoidung.sua');
Route::post('/nguoidung/sua/{id}',[NguoiDungController::class,'postSua'])->name('nguoidung.sua');
Route::get('/nguoidung/xoa/{id}',[NguoiDungController::class,'getXoa'])->name('nguoidung.xoa');
// Thể loại
Route::get('/theloai',[TheLoaiController::class,'getDanhSach'])->name('theloai');
Route::get('/theloai/them',[TheLoaiController::class,'getThem'])->name('theloai.them');
Route::post('/theloai/them',[TheLoaiController::class,'postThem'])->name('theloai.them');
Route::get('/theloai/sua/{id}',[TheLoaiController::class,'getSua'])->name('theloai.sua');
Route::post('/theloai/sua/{id}',[TheLoaiController::class,'postSua'])->name('theloai.sua');
Route::get('/theloai/xoa/{id}',[TheLoaiController::class,'getXoa'])->name('theloai.xoa');
// Nhà Sản Xuất
Route::get('/nhasanxuat',[NhaSanXuatController::class,'getDanhSach'])->name('nhasanxuat');
Route::get('/nhasanxuat/them',[NhaSanXuatController::class,'getThem'])->name('nhasanxuat.them');
Route::post('/nhasanxuat/them',[NhaSanXuatController::class,'postThem'])->name('nhasanxuat.them');
Route::get('/nhasanxuat/sua/{id}',[NhaSanXuatController::class,'getSua'])->name('nhasanxuat.sua');
Route::post('/nhasanxuat/sua/{id}',[NhaSanXuatController::class,'postSua'])->name('nhasanxuat.sua');
Route::get('/nhasanxuat/xoa/{id}',[NhaSanXuatController::class,'getXoa'])->name('nhasanxuat.xoa');
// Nới Sản Xuất
Route::get('/noisanxuat',[NoiSanXuatController::class,'getDanhSach'])->name('noisanxuat');
Route::get('/noisanxuat/them',[NoiSanXuatController::class,'getThem'])->name('noisanxuat.them');
Route::post('/noisanxuat/them',[NoiSanXuatController::class,'postThem'])->name('noisanxuat.them');
Route::get('/noisanxuat/sua/{id}',[NoiSanXuatController::class,'getSua'])->name('noisanxuat.sua');
Route::post('/noisanxuat/sua/{id}',[NoiSanXuatController::class,'postSua'])->name('noisanxuat.sua');
Route::get('/noisanxuat/xoa/{id}',[NoiSanXuatController::class,'getXoa'])->name('noisanxuat.xoa');
// Bảo Hành
Route::get('/baohanh',[BaoHanhController::class,'getDanhSach'])->name('baohanh');
Route::get('/baohanh/them',[BaoHanhController::class,'getThem'])->name('baohanh.them');
Route::post('/baohanh/them',[BaoHanhController::class,'postThem'])->name('baohanh.them');
Route::get('/baohanh/sua/{id}',[BaoHanhController::class,'getSua'])->name('baohanh.sua');
Route::post('/baohanh/sua/{id}',[BaoHanhController::class,'postSua'])->name('baohanh.sua');
Route::get('/baohanh/xoa/{id}',[BaoHanhController::class,'getXoa'])->name('baohanh.xoa');
// Tình trạng
Route::get('/tinhtrang',[TinhTrangController::class,'getDanhSach'])->name('tinhtrang');
Route::get('/tinhtrang/them',[TinhTrangController::class,'getThem'])->name('tinhtrang.them');
Route::post('/tinhtrang/them',[TinhTrangController::class,'postThem'])->name('tinhtrang.them');
Route::get('/tinhtrang/sua/{id}',[TinhTrangController::class,'getSua'])->name('tinhtrang.sua');
Route::post('/tinhtrang/sua/{id}',[TinhTrangController::class,'postSua'])->name('tinhtrang.sua');
Route::get('/tinhtrang/xoa/{id}',[TinhTrangController::class,'getXoa'])->name('tinhtrang.xoa');
// Sản phẩm
Route::get('/sanpham',[SanPhamController::class,'getDanhSach'])->name('sanpham');
Route::get('/sanpham/them',[SanPhamController::class,'getThem'])->name('sanpham.them');
Route::post('/sanpham/them',[SanPhamController::class,'postThem'])->name('sanpham.them');
Route::get('/sanpham/sua/{id}',[SanPhamController::class,'getSua'])->name('sanpham.sua');
Route::post('/sanpham/sua/{id}',[SanPhamController::class,'postSua'])->name('sanpham.sua');
Route::get('/sanpham/xoa/{id}',[SanPhamController::class,'getXoa'])->name('sanpham.xoa');
Route::get('sanpham_details/{id}',[SanPhamController::class,'getDetails']);
Route::post('/sanpham/nhap',[SanPhamController::class,'postNhap'])->name('sanpham.nhap');
Route::get('/sanpham/xuat',[SanPhamController::class,'getXuat'])->name('sanpham.xuat');
// Đơn Hàng
Route::get('/donhang',[DatHangController::class,'getDanhSach'])->name('donhang');
Route::get('/donhang/them',[DatHangController::class,'getThem'])->name('donhang.them');
Route::post('/donhang/them',[DatHangController::class,'PostThem'])->name('donhang.them');
Route::get('/donhang/sua/{id}',[DatHangController::class,'getSua'])->name('donhang.sua');
Route::post('/donhang/sua/{id}',[DatHangController::class,'postSua'])->name('donhang.sua');
Route::get('/donhang/xoa/{id}',[DatHangController::class,'getXoa'])->name('donhang.xoa');
}); 