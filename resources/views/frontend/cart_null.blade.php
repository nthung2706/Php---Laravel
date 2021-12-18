<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>{{ __('label.giohang') }}</title>
</head>
<body>
    @include('layouts.header')
    @include('layouts.logo')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>{{ __('label.giohangrong') }}</h2>
                        <a class="btn btn-danger" href="{{ route('home') }}">{{ __('label.tieptucmuasam') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.script')
</body>
</html>