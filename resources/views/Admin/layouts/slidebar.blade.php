<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <u class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ Route('home') }}"  class="nav-link">Trang Chủ</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Thành Viên</a>
        </li>
    </u>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-left"></i>
                        Đăng nhập </a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="bi bi-briefcase"></i> Đăng
                        ký</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">{{ __('label.home') }}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Đăng Xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('public/site') }}/index3.html" class="brand-link">
        <img src="{{ url('public/site') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ __('label.HomeAdmin') }}</span>
    </a>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('public/site') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">  {{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            {{ __('label.manager') }}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">7</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('theloai') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('label.theloai') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('nhasanxuat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('label.nhasanxuat') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('noisanxuat') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('label.noisanxuat') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('baohanh') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bảo hành</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tinhtrang') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('label.tinhtrang') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sanpham') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('label.sanpham') }}</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="{{ route('nguoidung') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            {{ __('label.user') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('donhang') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            {{ __('label.donhang') }}
                        </p>
                    </a>
                </li>
                </li>
            </ul>

        </nav>
    </div>
</aside>
