@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.sanpham') }}</div>
        <div class="card-body">
            <form action="{{ route('sanpham.sua', ['id' => $sanpham->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="nguoidung_id">{{ __('label.user') }}</label>
                        <select name="nguoidung_id" id="nguoidung_id"
                            class="form-control @error('nguoidung_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($nguoidung as $value)
                                <option value="{{ $value->id }}"
                                    {{ $sanpham->NguoiDung_ID == $value->id ? 'selected' : '' }}>
                                    {{ $value->name }}
                                </option>
                            @endforeach
                            @error('nguoidung_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </select>
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="theloai_id">{{ __('label.theloai') }}</label>
                        <select name="theloai_id" id="theloai_id"
                            class="form-control @error('theloai_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($theloai as $value)
                                <option value="{{ $value->id }}"
                                    {{ $sanpham->TheLoai_ID == $value->id ? 'selected' : '' }}>
                                    {{ $value->TheLoai }}
                                </option>
                            @endforeach
                            @error('theloai_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="nhasanxuat_id">{{ __('label.nhasanxuat') }}</label>
                        <select name="nhasanxuat_id" id="nhasanxuat_id"
                            class="form-control @error('nhasanxuat_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($nhasanxuat as $value)
                                <option value="{{ $value->id }}"
                                    {{ $sanpham->NhaSanXuat_ID == $value->id ? 'selected' : '' }}>
                                    {{ $value->NhaSanXuat }}
                                </option>
                            @endforeach
                            @error('nhasanxuat_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </select>
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="noisanxuat_id">{{ __('label.noisanxuat') }}</label>
                        <select name="noisanxuat_id" id="noisanxuat_id"
                            class="form-control @error('noisanxuat_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($noisanxuat as $value)
                                <option value="{{ $value->id }}"
                                    {{ $sanpham->NoiSanXuat_ID == $value->id ? 'selected' : '' }}>
                                    {{ $value->NoiSanXuat }}
                                </option>
                            @endforeach
                            @error('noisanxuat_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="namsanxuat">{{ __('label.namsanxuat') }}</label>
                        <input type="date" class="form-control @error('namsanxuat') is-invalid @enderror" id="namsanxuat"
                            name="namsanxuat" value="{{ $sanpham->NamSanXuat }}" />
                        @error('namsanxuat')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="baohanh_id">{{ __('label.baohanh') }}</label>
                        <select name="baohanh_id" id="baohanh_id"
                            class="form-control @error('baohanh_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($baohanh as $value)
                                <option value="{{ $value->id }}"
                                    {{ $sanpham->BaoHanh_ID == $value->id ? 'selected' : '' }}>
                                    {{ $value->BaoHanh }} {{ __('label.thang') }}
                                </option>
                            @endforeach
                            @error('baohanh_id')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                            @enderror
                        </select>
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="giamgia">{{ __('label.giamgia') }}({{ __('label.%') }})</label>
                        <input type="number" class="form-control @error('giamgia') is-invalid @enderror" id="giamgia"
                            name="giamgia" value="{{ $sanpham->GiamGia }}" />
                        @error('giamgia')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="tensanpham">{{ __('label.tensanpham') }}</label>
                        <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham"
                            name="tensanpham" value="{{ $sanpham->TenSanPham }}" />
                        @error('tensanpham')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gianhap">{{ __('label.gianhap') }}</label>
                    <input type="number" class="form-control  @error('gianhap') is-invalid @enderror" id="gianhap "
                        name="gianhap" value="{{ $sanpham->GiaNhap }}" />
                    @error('gianhap')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="giaban">{{ __('label.giaban') }}</label>
                        <input type="number" class="form-control  @error('giaban') is-invalid @enderror" id="giaban "
                            name="giaban" value="{{ $sanpham->GiaBan }}" />
                        @error('giaban')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="soluong">{{ __('label.soluong') }}</label>
                        <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong"
                            name="soluong" value="{{ $sanpham->SoLuong }}" />
                        @error('soluong')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="hinhanh">{{ __('label.hinhanh') }}</label>
                        @if (!empty($sanpham->HinhAnh))
                            <img class="d-block rounded" src="{{ asset('/storage/app/' . $sanpham->HinhAnh) }}"
                                width="100" />
                            <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                        @endif
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                            name="hinhanh" value="{{ $sanpham->HinhAnh }}" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="hienthi">{{ __('label.hienthi') }}</label>
                        <select class="form-control @error('hienthi') is-invalid @enderror" id="hienthi" name="hienthi">
                            <option value="">--Chọn--</option>
                            <option value="1" {{ $sanpham->HienThi == 1 ? 'selected' : '' }}>
                                Hiễn thị sản phẩm
                            </option>
                            <option value="0" {{ $sanpham->HienThi == 0 ? 'selected' : '' }}>
                                Ẫn sản phẩm
                            </option>
                        </select>
                        @error('hienthi')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="thongsosanpham">{{ __('label.thongso') }}</label>
                    <textarea class="form-control ckeditor" name="thongsosanpham" id="chitiet" rows="5">
                            {!! $sanpham->ThongSoSanPham !!}  
                        </textarea>
                    @error('thongsosanpham')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="chitiet">{{ __('label.chitiet') }}</label>
                    <textarea class="form-control ckeditor" name="chitiet" id="chitiet" rows="5">
                           {!! $sanpham->ChiTiet !!}
                        </textarea>
                    @error('chitiet')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
