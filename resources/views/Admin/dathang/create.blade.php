@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Thêm {{ __('label.donhang') }}</div>
        <div class="card-body">
            <form action="{{ route('donhang.them') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nguoidung_id">{{ __('label.name') }}</label>
                    <select name="nguoidung_id" id="nguoidung_id"
                        class="form-control @error('nguoidung_id') is-invalid @enderror">
                        <option value="">--Chọn--</option>
                        @foreach ($nguoidung as $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}
                            </option>
                        @endforeach
                        @error('noisanxuat_id')
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
                            <option value="{{ $value->id }}">
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
                        name="sdt" value="{{ old('sdt') }}"  />
                    @error('sdt')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="diachi">{{ __('label.diachi') }}</label>
                    <input type="text" class="form-control @error('diachi') is-invalid @enderror" 
                        id="diachi" name="diachi"  />
                    @error('diachi')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
