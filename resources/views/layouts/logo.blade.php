<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{ route('home') }}"><img src="{{ url('public/frontend') }}/img/logo.png"></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    @foreach (Cart::content() as $value)
                        <a href="{{ route('home.giohang') }}">Giỏ Hàng - <span
                                class="cart-amunt">{{ number_format(($value->price - ($value->options->discount * $value->price) / 100) * $value->qty) }}</span>
                            <i class="fa fa-shopping-cart"></i> <span
                                class="product-count">{{ Cart::count() ?? 0 }}</span></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
