@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="...">ID</th>
                <th>Tiêu đề</th>
                <th style="width: 10%">Link</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Cập nhật </th>
                <th style="...">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)               
            
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>
                        <a href="{{ $slider->thumnb }}" target="_blank">
                            <img src="{{ $slider->thumnb }}" height="40px">
                        </a>
                    </td>
                    <td>{!! \App\Helper\Helper::active( $slider->active) !!}</td>
                    <td>{{ $slider->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}" >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow( {{ $slider->id }}, '/admin/sliders/destroy')" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{!! $sliders->links() !!}
@endsection
