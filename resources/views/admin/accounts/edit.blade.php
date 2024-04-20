@extends('admin.main')


@section('content')
   <form action="" method="POST" id="form">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên người dùng </th>
                <th>Email </th>
                <th>Ngày lập</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th>Kích hoạt</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td style="font-weight: 600">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <select name="role" id="" class="p-1" >
                            <option value="" class="disible">Vai trò</option>
                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Khách hàng</option>
                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Người quản trị</option>
                        </select>                        
                    </td>
                    <td>

                        <select name="active" id="" class="p-1">
                            <option value="">Trạng thái</option>
                            <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>Vô hiệu hóa</option>
                            <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Đang hoạt động</option>
                        </select>                 
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </td>
                </tr>
        </tbody>
    </table>
    @csrf
   </form>
{{-- {!! $u->links() !!} --}}
@endsection
