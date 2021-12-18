@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.nhasanxuat') }}</div>
        <div class="card-body">
            <form action="{{ route('nhasanxuat.sua', ['id' => $nhasanxuat->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nhasanxuat">{{ __('label.nhasanxuat') }}</label>
                    <input type="text" class="form-control @error('nhasanxuat') is-invalid @enderror" id="nhasanxuat"
                        name="nhasanxuat" value="{{ $nhasanxuat->NhaSanXuat }}" />
                    @error('nhasanxuat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="hinhanh">{{ __('label.hinhanh') }}</label>
                    @if (!empty($nhasanxuat->HinhAnh))
                        <img class="d-block rounded" src="{{ asset('/storage/app/' . $nhasanxuat->HinhAnh) }}"
                            width="100" />
                        <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                    @endif
                    <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh"
                        name="hinhanh" " />
                    @error('hinhanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
