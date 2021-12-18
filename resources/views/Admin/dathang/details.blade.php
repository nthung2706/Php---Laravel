@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.donhang') }}</div>
        <div class="card-body">
            <form action="{{ route('donhang.sua', ['id' => $dathang->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nguoidung_id">{{ __('label.user') }}</label>
                    <select name="nguoidung_id" id="nguoidung_id"
                        class="form-control @error('nguoidung_id') is-invalid @enderror">
                        <option value="">--Chọn--</option>
                        @foreach ($nguoidung as $value)
                            <option value="{{ $value->id }}"
                                {{ $dathang->NguoiDung_ID == $value->id ? 'selected' : '' }}>
                                {{ $value->name }}
                            </option>
                        @endforeach
                        @error('nguoidung_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tinhtrang_id">{{ __('label.tinhtrang') }}</label>
                    <select name="tinhtrang_id" id="tinhtrang_id"
                        class="form-control @error('tinhtrang_id') is-invalid @enderror">
                        <option value="">--Chọn--</option>
                        @foreach ($tinhtrang as $value)
                            <option value="{{ $value->id }}"
                                {{ $dathang->TinhTrang_id == $value->id ? 'selected' : '' }}>
                                {{ $value->TinhTrang }}
                            </option>
                        @endforeach
                        @error('tinhtrang_id')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sdt">{{ __('label.sdt') }}</label>
                    <input type="number" class="form-control @error('sdt') is-invalid @enderror"  id="sdt"
                        name="sdt" value="{{ $dathang->SDT }}" />
                    @error('sdt')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="diachi">{{ __('label.diachi') }}</label>
                    <input type="text" class="form-control @error('diachi') is-invalid @enderror"  id="diachi"
                        name="diachi" value="{{ $dathang->DiaChi }}" />
                    @error('diachi')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
