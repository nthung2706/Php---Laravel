@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.baohanh') }}</div>
        <div class="card-body">
            <form action="{{ route('baohanh.sua', ['id' => $baohanh->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="baohanh">{{ __('label.baohanh') }}</label> ({{ __('label.thang') }}*)
                    <input type="text" class="form-control @error('baohanh') is-invalid @enderror"  id="baohanh"
                        name="baohanh" value="{{ $baohanh->BaoHanh }}" />
                    @error('baohanh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection

