@extends('Admin.Admin')
@section('content')

        <p><a href="{{ route('tinhtrang.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>

    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.tinhtrang') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tinhtrang as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->TinhTrang }}</td>
                    <td><a href="{{ route('tinhtrang.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.tinhtrang') }} {{ $value->TinhTrang }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('tinhtrang.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection