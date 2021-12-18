@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Thêm {{ __('label.user') }}</div>
        <div class="card-body">
            <form action="{{ route('nguoidung.them') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('label.name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" loaiphim id="name"
                        name="name" value="{{ old('name') }}"  />
                    @error('name')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="chucvu">{{ __('label.chucvu') }}</label>
                    <select class="form-control @error('chucvu') is-invalid @enderror" id="chucvu" name="chucvu" >
                        <option value="" >--Chọn--</option>
                        <option value="1" selected>
                            Khách Hàng
                        </option>
                        <option value="0">
                            Quản Lí
                        </option>
                    </select>
                    @error('chucvu')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('label.email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" loaiphim id="email"
                        name="email" value="{{ old('email') }}"  />
                    @error('email')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">{{ __('label.password') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" loaiphim
                        id="password" name="password"  />
                    @error('password')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">{{ __('label.cf_password') }}</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                        loaiphim id="password_confirmation" name="password_confirmation"  />
                    @error('password_confirmation')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
