<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ __('label.thutuc') }}</title>
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
                        <form action="">
                            <input type="text" placeholder="{{ __('label.timsanpham') }}">
                            <input type="submit" value="{{ __('label.timkiem') }}">
                        </form>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">{{ __('label.sanpham') }}</h2>
                        <div class="thubmnail-recent">
                            <img src="{{ url('public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                        <div class="thubmnail-recent">
                            <img src="{{ url('public/frontend') }}/img/product-thumb-1.jpg" class="recent-thumb"
                                alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">{{ __('label.phanhoi') }}? <a class="showlogin"
                                    data-toggle="collapse" href="#login-form-wrap" aria-expanded="false"
                                    aria-controls="login-form-wrap">{{ __('label.bamdangnhap') }}</a>
                            </div>
                            <form id="login-form-wrap" class="login collapse" method="post">
                                <p>
                                    Nếu bạn đã mua sắm với chúng tôi trước đây, vui lòng nhập thông tin chi tiết của bạn
                                    vào ô bên dưới. Nếu bạn là khách hàng mới, vui lòng chuyển đến phần Lập hóa đơn &
                                    Giao hàng.</p>
                                <p class="form-row form-row-first">
                                    <label for="username">{{ __('label.email') }} <span
                                            class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="username" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">{{ __('label.password') }} <span
                                            class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>
                                <p class="form-row">
                                    <input type="submit" value="{{ __('label.signin') }}" name="login"
                                        class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox"
                                            value="forever" id="rememberme" name="rememberme">
                                        {{ __('label.remember') }} </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">{{ __('label.quenmk') }}</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                            <div class="woocommerce-info">{{ __('label.cogiamgia') }} <a class="showcoupon"
                                    data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false"
                                    aria-controls="coupon-collapse-wrap">{{ __('label.nhapgiamgia') }}</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code"
                                        placeholder="{{ __('label.nhapgiamgia') }}" class="input-text"
                                        name="coupon_code">
                                </p>
                                <p class="form-row form-row-last">
                                    <input type="submit" value="{{ __('label.xacnhanma') }}" name="apply_coupon"
                                        class="button">
                                </p>
                                <div class="clear"></div>
                            </form>
                            <form enctype="multipart/form-data" action="{{ route('home.dat-hang') }}}"
                                class="checkout" method="post" name="checkout" id="checkout">
                                @csrf
                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>{{ __('label.thongtinkhachhang') }}</h3>
                                            <p id="billing_state_field"
                                                class="form-row form-row-first address-field validate-state"
                                                data-o_class="form-row form-row-first address-field validate-state">
                                                <label class=""
                                                    for="billing_state">{{ __('label.name') }}</label>
                                                <input type="text" id="billing_state" name="name"
                                                    placeholder="Nhập họ và tên"
                                                    value="{{ Auth::user()->name ?? '' }}" class="input-text ">
                                            </p>
                                            <p id="billing_postcode_field"
                                                class="form-row form-row-last address-field validate-required validate-postcode"
                                                data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">
                                                    {{ __('label.diachi') }} <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Nhập Địa chỉ"
                                                    id="billing_postcode" name="diachi" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_email_field"
                                                class="form-row form-row-first validate-required validate-email">
                                                <label class=""
                                                    for="billing_email">{{ __('label.sdt') }} <abbr title="required"
                                                        class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Nhập số điện thoại"
                                                    id="billing_email" name="sdt" class="input-text ">
                                            </p>
                                            <p id="billing_phone_field"
                                                class="form-row form-row-last validate-required validate-phone">
                                                <label class=""
                                                    for="billing_phone">{{ __('label.email') }} <abbr
                                                        title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="{{ Auth::user()->email ?? '' }}"
                                                    placeholder="Nhập email" id="billing_phone" name="email"
                                                    class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <h3 id="order_review_heading">Your order</h3>
                    <div id="order_review" style="position: relative;">
                        <table class="shop_table">
                            <thead>
                                <tr>
                                    <th class="product-name">{{ __('label.tensanpham') }}</th>
                                    <th class="product-total">{{ __('label.giaban') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $value)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $value->name }}<strong class="product-quantity"> ×
                                                {{ $value->qty }}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span
                                                class="amount">{{ number_format($value->price * $value->qty) }}<sup><u>đ</u></sup></span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                                <tr class="cart-subtotal">
                                    <th>{{ __('label.tongtien') }}</th>
                                    <td><span class="amount">{{ Cart::subtotal() }}<sup><u>đ</u></sup></span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>{{ __('label.phivat') }} 10{{ __('label.%') }}</th>
                                    <td><span class="amount">{{ Cart::tax() }}<sup><u>đ</u></sup></span>
                                    </td>
                                </tr>
                                <tr class="shipping">
                                    <th>{{ __('label.phivanchuyen') }}</th>
                                    <td>

                                        Miển phí vận chuyển
                                        <input type="hidden" class="shipping_method" value="free_shipping"
                                            id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                    </td>
                                </tr>


                                <tr class="order-total">
                                    <th>{{ __('label.ttthanhtoan') }}</th>
                                    <td><strong><span
                                                class="amount">{{ Cart::total() }}<sup><u>đ</u></sup></span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="payment">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input type="radio" data-order_button_text="" checked="checked" value="bacs"
                                        name="payment_method" class="input-radio" id="payment_method_bacs">
                                    <label for="payment_method_bacs">Chuyển khoản trực tiếp </label>
                                    <div class="payment_box payment_method_bacs">
                                        <p>Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi.
                                            Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt
                                            hàng của bạn sẽ không được giao cho đến khi tiền đã hết trong tài khoản của
                                            chúng tôi.</p>
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <input type="radio" data-order_button_text="" value="cheque" name="payment_method"
                                        class="input-radio" id="payment_method_cheque">
                                    <label for="payment_method_cheque">Thanh toán khi nhận hàng. </label>
                                </li>
                                <li class="payment_method_paypal">
                                    <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal"
                                        name="payment_method" class="input-radio" id="payment_method_paypal">
                                    <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark"
                                            src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a
                                            title="What is PayPal?"
                                            onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"
                                            class="about_paypal"
                                            href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">PayPal là gì?</a>
                                    </label>
                                    <div style="display:none;" class="payment_box payment_method_paypal">
                                        <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng của mình nếu
                                            bạn không có PayPal.</p>
                                    </div>
                                </li>
                            </ul>
                            <a href="{{ route('home.dat-hang') }}"
                                onclick="event.preventDefault();document.getElementById('checkout').submit();"
                                class="btn btn-primary">{{ __('label.dathang') }}</a>
                            <div class="clear"></div>
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
