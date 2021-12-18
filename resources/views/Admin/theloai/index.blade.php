@extends('Admin.Admin')
@section('content')
        <p><a href="{{ route('theloai.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>
    <table id='table' class="ui celled table table-hover text-center" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.name_slug') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($theloai as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->TheLoai }}</td>
                    <td>{{ $value->TheLoai_slug }}</td>
                    <td><a href="{{ route('theloai.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.theloai') }} {{ $value->theloai }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('theloai.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection