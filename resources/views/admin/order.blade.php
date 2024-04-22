{{-- @extends('head')
@section('content')
    <div class="container">
        @php
            $total = 0;
            $total_ship = 0;
        @endphp 
        
        @foreach ( $customers as $customer )
            @if ($customer->email == $users->email)
                @foreach ($carts as $key => $cart )         
                    @if($cart->customer_id == $customer->id)
                        @php                 
                            $price = floatval($cart->price) *  $cart->qty;
                            
                            $total += $price;
                            $ship = floatval(42000);

                            $total_ship = $total + $ship;                        
                        @endphp         
                

                        <div class="product__cart product__cart--body ">
                            <div class="product__cart--item product__cart--item-img">
                                <img src="{{ $cart->product->thumnb }}" alt=""></div>
                            <div class="product__cart--item product__cart--item-con">
                                <div class="product__cart--item-cont"><h5>Tên: {{ $cart->product->name  }}</h5></div>                
                                <div class="product__cart--item-cont"><span>Số lượng: {{ $cart->qty }}</span></div>
                                <div class="product__cart--item-cont"><span>Tổng tiền:{{ number_format($price) }}đ</span></div>
                                
                            </div>  
                        </div>     
                    @endif
                @endforeach
                
            <div class="customer mt-2">
                <ul>
                    <li>Tên khách hàng : <strong>{{ $customer->name }}</strong></li>
                    <li>Số điện thoại : <strong>{{ $customer->phone }}</strong></li>
                    <li>Địa chỉ : <strong>{{ $customer->address }}</strong></li>
                    <li>Email : <strong>{{ $customer->email }}</strong></li>
                    <li>Ghi chú : <strong>{{ $customer->content }}</strong></li>
                </ul>
            </div>
            
                
            @endif
        @endforeach





















        
    </div>
@endsection --}}
