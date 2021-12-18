@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Thêm {{ __('label.nhasanxuat') }}</div>
        <div class="card-body">
            <form action="{{ route('nhasanxuat.them') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nhasanxuat">{{ __('label.nhasanxuat') }}</label>
                    <input type="text" class="form-control @error('nhasanxuat') is-invalid @enderror"  id="nhasanxuat"
                        name="nhasanxuat" value="{{ old('nhasanxuat') }}"  />
                    @error('nhasanxuat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="hinhanh">{{ __('label.hinhanh') }}</label>
                    <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                        name="hinhanh" value="{{ old('hinhanh') }}" />
                    @error('hinhanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
