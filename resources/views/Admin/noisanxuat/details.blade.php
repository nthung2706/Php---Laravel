@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.noisanxuat') }}</div>
        <div class="card-body">
            <form action="{{ route('noisanxuat.sua', ['id' => $noisanxuat->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="noisanxuat">{{ __('label.noisanxuat') }}</label>
                    <input type="text" class="form-control @error('noisanxuat') is-invalid @enderror"  id="noisanxuat"
                        name="noisanxuat" value="{{ $noisanxuat->NoiSanXuat }}" />
                    @error('noisanxuat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection

