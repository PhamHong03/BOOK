@extends('admin.main')


@section('content')
<form method="POST" id="form" class="form">
    
    <div class="cart__admin">
        <div class="product__cart--admin ">
            <table class="table cart__admin-table">
                <tbody>
                  <tr >
                    <th class="column-1 table_admin">HÌNH ẢNH</th>
                    <th class="column-2 table_admin">TÊN SẢN PHẨM</th>
                    <th class="column-3 table_admin">GIÁ SẢN PHẨM</th>
                    <th class="column-4 table_admin">SL</th>
                    <th class="column-5 table_admin">TỔNG GIÁ</th>
                  </tr>              
                
                    @foreach ($carts as $key => $cart )         
                        @php                 
                            $price = floatval($cart->price) *  $cart->qty;
                            
                            $total += $price;
                            $ship = floatval(42000);

                            $total_ship = $total + $ship;                        
                        @endphp          
                        
                        <tr class="table_row ">
                            <td class="column-1 table_admin ">
                                <div class="how_itemcart1">
                                    <img src="{{ $cart->product->thumnb }}" alt="IMG" style="width: 70px">
                                </div>
                            </td>
                            <td class="column-2 table_admin">{{ $cart->product->name }}</td>
                            <td class="column-3 table_admin">{{ number_format($cart->price)}}đ</td>
                            <td class="column-4 table_admin">{{ $cart->qty }}</td>
                            <td class="column-3 table_admin">{{ number_format($price) }}đ</td>
                        </tr>                                    
                    @endforeach
                    <tr style="font-size: 1.4rem">
                        <td colspan="4" class="text-red text-right"><strong>Tổng thanh toán:</strong> </td>
                        <td style="width:100px"><strong>{{ number_format($total) }}đ</strong></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <button class=" btn btn-success " id="btn-delivery" style="float: right" onclick="duyetdon(event)">Vận chuyển</button>

    </div>
    @csrf
</form>
@endsection              
      