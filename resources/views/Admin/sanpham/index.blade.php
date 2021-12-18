@extends('Admin.Admin')
@section('content')
    <nav class="mb-3">
        <a href="{{ route('sanpham.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a>
        <a href="#nhap" data-bs-toggle="modal" data-bs-target="#importModal" class="btn btn-danger"><i class="bi bi-download"></i>
            Nhập Excel</a>
        <a href="{{ route('sanpham.xuat') }}" class="btn btn-success"><i class="bi bi-download"></i> Xuất Excel</a>
    </nav>

    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th></th>
                <th>STT</th>
                <th>{{ __('label.user') }}</th>
                <th>{{ __('label.tensanpham') }}</th>
                <th>{{ __('label.giaban') }}</th>
                <th>{{ __('label.thongtin') }}</th>
                <th>{{ __('label.giatiensp') }}</th>
                <th>{{ __('label.hinhanh') }}</th>
                <th>{{ __('label.hienthi') }}</th>
                <th>{{ __('label.thaotac') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $tongchi = 0;
            @endphp
            @foreach ($sanpham as $value)
                <tr>
                    <th><button type="button" class="btn btn-primary details-btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-id="{{ $value->id }}">
                            Chi tiết
                        </button></th>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->nguoidung->name }}</td>
                    <td>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('label.name') }}</th>
                                    <th>{{ __('label.name_slug') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $value->TenSanPham }}</td>
                                    <td>{{ $value->TenSanPham_slug }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>{{ number_format($value->GiaBan) }}<sup><u>đ</u></sup></td>
                    <td>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('label.theloai') }}</th>
                                    <th>{{ __('label.nhasanxuat') }}</th>
                                    <th>{{ __('label.noisanxuat') }}</th>
                                    <th>{{ __('label.baohanh') }}</th>
                                    <th>{{ __('label.giamgia') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $value->theloai->TheLoai }}</td>
                                    <td>{{ $value->nhasanxuat->NhaSanXuat }}</td>
                                    <td>{{ $value->noisanxuat->NoiSanXuat }}</td>
                                    <td>{{ $value->baohanh->BaoHanh }} {{ __('label.thang') }}</td>
                                    <td>{{ $value->GiamGia }} {{ __('label.%') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>{{ __('label.gianhap') }}</th>
                                    <th>{{ __('label.soluong') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $tongtien = 0;
                                @endphp
                                <tr>
                                    <td class="text-end">{{ number_format($value->GiaNhap) }}<sup><u>đ</u></sup>
                                    </td>
                                    <td class="text-end">{{ $value->SoLuong }}</td>
                                    @php
                                        $tongtien += $value->GiaNhap * $value->SoLuong;
                                    @endphp
                                <tr>
                                    <td class="bg-cyan" colspan="1">{{ __('label.tongtien') }}</td>
                                    <td class="text-end bg-cyan">{{ number_format($tongtien) }}<sup><u>đ</u></sup></td>
                                </tr>
                </tr>
        </tbody>
    </table>
    </td>
    <td><img src="{{ asset('/storage/app/' . $value->HinhAnh) }}" width="80" height="80" /></td>
    <td>
        @if ($value->HienThi == '1')
            <i style="font-size:2rem; color:green;  text-shadow: 1px 1px 1px green;" class="bi bi-check-lg"></i>
        @else
            <i style="font-size:2rem; color:red;  text-shadow: 1px 1px 1px red;" class="bi bi-x-circle-fill"></i>
        @endif
    </td>
    <td><a href="{{ route('sanpham.xoa', ['id' => $value->id]) }}"
           ></a>
        <a href="{{ route('sanpham.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"
                style="font-size: 2rem;"></i></a>
    </td>
    </tr>
    @php
    $tongchi += $tongtien;
    @endphp
    @endforeach
    </tbody>
    <tr>
        <td class="bg-cyan" colspan="6">{{ __('label.tongchi') }}</td>
        <td class="text-end bg-cyan">{{ number_format($tongchi) }}<sup><u>đ</u></sup></td>
    </tr>
    </table>
    <form action="{{ route('sanpham.nhap') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-0">
                            <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                            <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="fal fa-times"></i> Hủy bỏ</button>
                        <button type="submit" class="btn btn-danger"><i class="fal fa-upload"></i> Nhập dữ liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex">
                        <p>{{ __('label.sanpham') }}</p>: <p class="sanpham-title"></p>
                    </div>
                    <a href="#" data-bs-dismiss="modal" aria-label="Close"> <i class="bi bi-x-lg"></i></a>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <h3 class="text-center fw-bold">{{ __('label.thongso') }}</h3>
                        <p class="thongso-title text-center"></p>
                    </div>
                    <div class="d-flex flex-column">
                        <h3 class="text-center fw-bold">{{ __('label.chitiet') }}</h3>
                        <p class="chitiet-title text-center"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
