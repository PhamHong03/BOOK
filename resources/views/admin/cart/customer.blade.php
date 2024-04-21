@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên khách hàng </th>
                <th>Số điện thoại </th>
                <th>Email </th>
                <th>Ngày đặt hàng</th>
                <th>Trạng thái</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)          
            
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>
                        @if ($customer->status == 0)
                            <strong style="color: blue">                                
                                Chờ phê duyệt
                            </strong>
                        @elseif($customer->status == 1)
                            <strong style="color: green">                                
                                Đã phê duyệt
                            </strong>
                        @elseif($customer->status == 2)
                            <strong style="color: orangered">                                
                                Đơn bị từ chối
                            </strong>
                        @elseif($customer->status == 3)
                            <strong style="color: purple">                                
                                Đã giao
                            </strong>                    
                        @endif  
                    </td>
                    <td>
                        {{-- <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}" >
                            <i class="fa-solid fa-eye"> </i> 
                            
                        </a> --}}
                        <a class="btn btn-danger btn-sm" href ="/admin/customers/edit/{{ $customer->id }}" >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{!! $customers->links() !!}
@endsection
