@extends('Admin.Admin')
@section('content')

        <p><a href="{{ route('nhasanxuat.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>

    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.name_slug') }}</th>
                <th>{{ __('label.hinhanh') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nhasanxuat as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->NhaSanXuat }}</td>
                    <td>{{ $value->NhaSanXuat_slug }}</td>
                    <td><img src="{{ asset('/storage/app/' . $value->HinhAnh) }}" width="100" /></td>
                    <td><a href="{{ route('nhasanxuat.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.nhasanxuat') }} {{ $value->NhaSanXuat }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('nhasanxuat.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection