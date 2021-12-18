<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>{{ __('label.dathangthanhcong') }}</title>
</head>

<body>
    @include('layouts.header')
    @include('layouts.logo')
    @include('layouts.content-details')
    <div class="product-big-title-areas">
        <div class="container">
            <div class="text-center" style="margin-top:15px; margin-bottom:15px;">
            <div>
                <i style="font-size:50px; color:red;" class="bi bi-check-circle-fill"></i>
            </div>
            <div>
                <h3>Bạn đã đặt hàng thành công!</h3>
            </div>
            <p>Cảm ơn bạn đã đặt hàng! Đơn hàng của bạn đang được xử lý và sẽ hoàn thành trong vòng 3-6 giờ.
                Bạn sẽ nhận được một email xác nhận khi đơn đặt hàng của bạn được hoàn thành.</p>
                <a href="{{ route('home') }}" class="btn btn-danger">TIẾP TỤC MUA SẮM</a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.script')
</body>

</html>
