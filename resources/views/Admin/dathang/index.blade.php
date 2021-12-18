@extends('Admin.Admin')
@section('content')
<p><a href="{{ route('donhang.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>
    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.user') }}</th>
                <th>{{ __('label.tinhtrang') }}</th>
                <th>{{ __('label.sdt') }}</th>
                <th>{{ __('label.diachi') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dathang as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->nguoidung->name }}</td>
                    <td>{{ $value->tinhtrang->TinhTrang }}</td>
                    <td>{{ $value->SDT }}</td>
                    <td>{{ $value->DiaChi }}</td>
                    <td><a href="{{ route('donhang.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.donhang') }} {{ $value->nguoidung->name }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('donhang.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection