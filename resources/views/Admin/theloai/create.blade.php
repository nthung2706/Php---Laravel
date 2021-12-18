@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Thêm Người Dùng</div>
        <div class="card-body">
            <form action="{{ route('theloai.them') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="theloai">{{ __('label.theloai') }}</label>
                    <input type="text" class="form-control @error('theloai') is-invalid @enderror" loaiphim id="theloai"
                        name="theloai" value="{{ old('theloai') }}"  />
                    @error('theloai')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection
