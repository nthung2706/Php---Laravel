@extends('Admin.Admin')
@section('content')

        <p><a href="{{ route('noisanxuat.them') }}" class="btn btn-info"><i class="fas fa-plus"></i> Thêm mới</a></p>


    <table id="table" class="ui celled table table-hover text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>{{ __('label.name') }}</th>
                <th>{{ __('label.xoa') }}</th>
                <th>{{ __('label.sua') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($noisanxuat as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->NoiSanXuat }}</td>
                    <td><a href="{{ route('noisanxuat.xoa', ['id' => $value->id]) }}"
                            onclick="return confirm('{{ __('label.delete') }} {{ __('label.noisanxuat') }} {{ $value->NoiSanXuat }}')"><i
                                class="bi bi-trash"></i></a></td>
                    <td><a href="{{ route('noisanxuat.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection