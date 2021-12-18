@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Thêm {{ __('label.sanpham') }}</div>
        <div class="card-body">
            <form action="{{ route('sanpham.them') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="nguoidung_id">{{ __('label.user') }}</label>
                        <select name="nguoidung_id" id="nguoidung_id"
                            class="form-control @error('nguoidung_id') is-invalid @enderror">
                            <option value="">--Chọn--</option>
                            @foreach ($nguoidung as $value)
                                @if ($value->ChucVu == 0)
                                    <option value="{{ $value->id }}">
                                        {{ $value->name }}
                                    </option>
                                @endif
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
                                <option value="{{ $value->id }}">
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
                                <option value="{{ $value->id }}">
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
                                <option value="{{ $value->id }}">
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
                            name="namsanxuat" value="{{ old('namsanxuat') }}" />
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
                                <option value="{{ $value->id }}">
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
                            name="giamgia" value="{{ old('giamgia') }}" />
                        @error('giamgia')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="gianhap">{{ __('label.gianhap') }}</label>
                        <input type="number" class="form-control  @error('gianhap') is-invalid @enderror" id="gianhap "
                            name="gianhap" value="{{ old('gianhap') }}" />
                        @error('gianhap')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">

                    <label class="form-label" for="tensanpham">{{ __('label.tensanpham') }}</label>
                    <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham"
                        name="tensanpham" value="{{ old('tensanpham') }}" />
                    @error('tensanpham')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror

                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="giaban">{{ __('label.giaban') }}</label>
                        <input type="number" class="form-control  @error('giaban') is-invalid @enderror" id="giaban "
                            name="giaban" value="{{ old('giaban') }}" />
                        @error('giaban')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="soluong">{{ __('label.soluong') }}</label>
                        <input type="number" class="form-control @error('soluong') is-invalid @enderror" id="soluong"
                            name="soluong" value="{{ old('soluong') }}" />
                        @error('soluong')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                </div>
                <div class="form-group d-flex">
                    <div class="w-100 mr-2">
                        <label class="form-label" for="hinhanh">{{ __('label.hinhanh') }}</label>
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                            name="hinhanh" value="{{ old('hinhanh') }}" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="w-100 ml-2">
                        <label class="form-label" for="hienthi">{{ __('label.hienthi') }}</label>
                        <select class="form-control @error('hienthi') is-invalid @enderror" id="hienthi" name="hienthi">
                            <option value="">--Chọn--</option>
                            <option value="1" selected>
                                Hiễn thị sản phẩm
                            </option>
                            <option value="0">
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
                                                            </textarea>
                    @error('thongsosanpham')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="chitiet">{{ __('label.chitiet') }}</label>
                    <textarea class="form-control ckeditor" name="chitiet" id="chitiet" rows="5">
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
