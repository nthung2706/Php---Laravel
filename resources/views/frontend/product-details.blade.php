<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ $sanpham->TenSanPham }}</title>
</head>
<body>
    @include('layouts.header')
    @include('layouts.logo')
    @include('layouts.content-details')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{ __('label.thongso') }}</h2>
                        <div class="thubmnail-recent">
                            <img src="" class="recent-thumb" alt="">
                            <div class="product-sidebar-price">
                                    {!! $sanpham->ThongSoSanPham !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{ asset('/storage/app/' . $sanpham->HinhAnh) }}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $sanpham->TenSanPham }}</h2>
                                    <div class="product-inner-price">
                                        <p>{{ __('label.giamgia') }}: {{ $sanpham->GiamGia }}<sup>{{ __('label.%') }}</sup></p>
                                        <p>{{ __('label.giaban') }}: <u style="text-decoration: none; color: red;">{{ number_format($sanpham->GiaBan - ($sanpham->GiamGia * $sanpham->GiaBan) / 100) }}</u><sup><u>đ</u></sup></> <del>{{ number_format($sanpham->GiaBan) }}<sup><u>đ</u></sup></del></p>
                                        <p>{{ __('label.namsanxuat') }}: {{ date('d-m-Y', strtotime($sanpham->NamSanXuat)); }}</p>
                                        <p>{{ __('label.theloai') }}: {{ $sanpham->theloai->TheLoai }}</p>
                                        <p>{{ __('label.nhasanxuat') }}: {{ $sanpham->nhasanxuat->NhaSanXuat }}</p>
                                        <p>{{ __('label.noisanxuat') }}: {{ $sanpham->noisanxuat->NoiSanXuat }}</p>
                                        <p>{{ __('label.baohanh') }}: {{ $sanpham->baohanh->BaoHanh }} {{ __('label.thang') }}</p>
                                    </div>
                                    <form action="{{ Route('home.giohang.them',['TenSanPham_slug' => $sanpham->TenSanPham_slug]) }}" method="post" class="cart">
                                        @csrf
                                        <button class="add_to_cart_button" type="submit">{{ __('label.themvaogiohang') }}</button>
                                    </form> 
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home"
                                                    aria-controls="home" role="tab" data-toggle="tab">{{ __('label.chitiet') }}</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                {!! $sanpham->ChiTiet !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.script')
</body>
</html>
