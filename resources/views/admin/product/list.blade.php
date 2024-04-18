@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên sản phẩm </th>
                <th>Danh mục </th>
                <th>Giá gốc </th>
                <th>% giảm</th>
                <th>SL Kho</th>
                <th>Tác giả </th>
                <th>Nhà Xuất Bản</th>
                <th>Trạng thái</th>
                <th>Cập nhật</th>
                <th style="width: 100px">&nbsp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)               
            
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->menu->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price_sale }}</td>
                    <td>{{ $product->quantity}}</td>
                    <td>{{ $product->author }}</td>
                    <td>{{ $product->publisher }}</td>
                    <td>{!! \App\Helper\Helper::active( $product->active) !!}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}" >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" href ="#" onclick="removeRow( {{ $product->id }}, '/admin/products/destroy')" >
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{!! $products->links() !!}
@endsection
