<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ __('label.giohang') }}</title>
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
                        <h2 class="sidebar-title">{{ __('label.timsanpham') }}</h2>
                        <form action="#">
                            <input type="text" placeholder="{{ __('label.timsanpham') }}">
                            <input type="submit" value="{{ __('label.timkiem') }}">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{ __('label.sanpham') }}</h2>
                        <div class="thubmnail-recent">
                            <img src="{{ url('/public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('/public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('/public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('/public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">{{ __('label.hinhanh') }}</th>
                                            <th class="product-name">{{ __('label.tensanpham') }}</th>
                                            <th class="product-price">{{ __('label.giaban') }}</th>
                                            <th class="product-quantity">{{ __('label.soluong') }}</th>
                                            <th class="product-subtotal">{{ __('label.tongtien') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $value)
                                            <tr class="cart_item">
                                                <td class="product-remove">
                                                    <a title="Remove this item" class="remove"
                                                        href="{{ route('home.giohang.xoa', ['row_id' => $value->rowId]) }}">×</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <img width="145" height="145" class="shop_thumbnail"
                                                        src="{{ asset('/storage/app/' . $value->options->image) }}">
                                                </td>
                                                <td class="product-name">
                                                    <a href="single-product.html">{{ $value->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span
                                                        class="amount">{{ number_format($value->price - ($value->options->discount * $value->price) / 100) }}<sup><u>đ</u></sup></span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added d-flex">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('home.giohang.giam', ['row_id' => $value->rowId]) }}">-</a>
                                                        <input type="number" size="4" class="input-text qty text"
                                                            title="Qty" value="{{ $value->qty }}" min="0" step="1">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('home.giohang.tang', ['row_id' => $value->rowId]) }}">+</a>
                                                    </div>
                                                </td>

                                                <td class="product-subtotal">
                                                    <span
                                                        class="amount">{{ number_format(($value->price - ($value->options->discount * $value->price) / 100) * $value->qty) }}<sup><u>đ</u></sup></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">{{ __('label.giamgia') }}:</label>
                                                    <input type="text" placeholder="{{ __('label.nhapgiamgia') }}"
                                                        value="" id="coupon_code" class="input-text"
                                                        name="coupon_code">
                                                    <a href=""
                                                        class="btn btn-primary">{{ __('label.nhapgiamgia') }}</a>
                                                </div>
                                                <a href="{{ route('home.dat-hang') }}" name="proceed"
                                                    class="btn btn-primary">{{ __('label.thutuc') }}</a>
                                                <a href="{{ route('home.giohang.xoaTatCa') }}" name="proceed"
                                                    class="btn btn-primary">{{ __('label.xoagiohang') }}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
