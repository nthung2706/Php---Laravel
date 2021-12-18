@extends('Admin.Admin')
@section('content')
    <div class="card">
        <div class="card-header">Sữa {{ __('label.tinhtrang') }}</div>
        <div class="card-body">
            <form action="{{ route('tinhtrang.sua', ['id' => $tinhtrang->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="tinhtrang">{{ __('label.tinhtrang') }}</label>
                    <input type="text" class="form-control @error('tinhtrang') is-invalid @enderror"  id="tinhtrang"
                        name="tinhtrang" value="{{ $tinhtrang->TinhTrang }}" />
                    @error('tinhtrang')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i>
                    {{ __('label.savechange') }}</button>
            </form>
        </div>
    </div>
@endsection

