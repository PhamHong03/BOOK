@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên người dùng </th>
                <th>Email </th>
                <th>Ngày lập</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $u)          
            
                <tr>
                    <td>{{ $u->id }}</td>
                    <td style="font-weight: 600">{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at }}</td>
                    <td>
                        @if ($u->role == 1)
                            <p style="color: blue;font-weight: 600">Quản trị viên</p>
                        @else  
                            <p style="color: orangered;font-weight: 600">Khách hàng</p>
                        @endif
                    </td>
                    <td>
                        @if ($u->active == 1)
                            <p style="color: green;font-weight: 600">Đang hoạt động</p>
                        @else  
                            <p style="color: grey;font-weight: 600">Vô hiệu hóa</p>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/account/edit/{{ $u->id }}" >
                            <i class="fa-solid fa-pen-to-square"></i>                            
                        </a>
                            {{-- <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow( {{ $customer->id }}, '/admin/customers/destroy')" >
                                <i class="fa-solid fa-trash"></i>
                            </a> --}}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{-- {!! $u->links() !!} --}}
@endsection
