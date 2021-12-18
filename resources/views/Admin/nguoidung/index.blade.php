@extends('Admin.Admin')
@section('content')

        <p><a href="{{ route('nguoidung.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>

    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.email') }}</th>
                <th>{{ __('label.chucvu') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nguoidung as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->ChucVu == 1 ? 'Khách Hàng' : 'Nhân Viên' }}</td>
                    <td><a href="{{ route('nguoidung.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.user') }} {{ $value->name }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('nguoidung.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



@endsection
