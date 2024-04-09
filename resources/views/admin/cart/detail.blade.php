@extends('admin.main')


@section('content')
    <div class="customer mt-2">
        <ul>
            <li>Tên khách hàng : <strong>{{ $customers->name }}</strong></li>
            <li>Số điện thoại : <strong>{{ $customers->phone }}</strong></li>
            <li>Địa chỉ : <strong>{{ $customers->address }}</strong></li>
            <li>Email : <strong>{{ $customers->email }}</strong></li>
            <li>Ghi chú : <strong>{{ $customers->content }}</strong></li>
        </ul>
    </div>
    @php
        $total = 0;
        $total_ship = 0;
    @endphp 
    <div class="cart__admin">
        <div class="product__cart--admin">
            <table class="table">
                <tbody>
                  <tr>
                    <th class="column-1">Sản phẩm</th>
                    <th class="column-2"></th>
                    <th class="column-3">Giá</th>
                    <th class="column-4">Số lượng</th>
                    <th class="column-5">total</th>
                  </tr>              
                
                    @foreach ($carts as $key => $cart )         
                        @php                 
                            $price = floatval($cart->price) *  $cart->qty;
                            
                            $total += $price;
                            $ship = floatval(42000);

                            $total_ship = $total + $ship;                        
                        @endphp          
                        
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how_itemcart1">
                                    <img src="" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2"></td>
                            <td class="column-3">{{ number_format($cart->price)}}đ</td>
                            <td class="column-4">{{ $cart->qty }}</td>
                            <td class="column-3">{{ number_format($price) }}</td>
                        </tr>                                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
             
                    {{-- <div class="product__cart--admin-body">
                        <div class="product__cart--admin-item product__cart--admin-item-img">
                            <img src="" alt="">
                        </div>
                        <div class="product__cart--admin-item product__cart--admin-item-con">
                            <div class="product__cart--admin-item-cont"><h5>ten</h5></div>                
                            <div class="product__cart--admin-item-cont"><span>{{ number_format($cart->price) }}đ</span></div>
                            <div class="product__cart--admin-item-cont"><span>{{ $cart->qty }}</span></div>
                            <div class="product__cart--admin-item-cont"><span>{{ number_format($price) }}đ</span></div>
                            
                        </div>                    
                    </div>   --}}
                    