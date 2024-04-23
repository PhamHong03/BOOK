@extends('head')
@section('content')
    <div class="container">
        @php
            $total = 0;
            $total_ship = 0;
        @endphp 
        
        <h3 class="order__off--me">Chi tiết đơn hàng của tôi</h3>
        @foreach ( $customers as $customer )
            @if ($customer->email == $users->email)
                <div class="cartDetail">
                    <div class="cartDetail__left mt-2">
                        <span><strong>MÃ ĐƠN HÀNG: </strong>{{ $customer->id }}0123456789abc</span>
                    </div>
                    <div class="cartDetail__right mt-2">
                        @if ( $customer->status  == 0 )
                            <span style="color: blue">Chờ xác nhận</span>
                        @elseif ( $customer->status  == 1)
                            <span style="color: green">Đã phê duyệt</span>
                        @elseif ( $customer->status  == 2)
                            <span style="color: orangered">Đơn hàng của bạn không đủ điều kiện</span>
                        @elseif ( $customer->status == 3)
                            <span style="color: purple">Đơn hàng đang trên đường đến bạn</span>
                        @endif
                    </div>
                </div>
                <div class="order">
                    <div class="cart__order--left">
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
                                        <img src="{{ $cart->product->thumnb  }}" alt="" style="width:100px; height:100px"></div>
                                    <div class="product__cart--item product__cart--item-con">
                                        <div class="product__cart--item-cont"><h6>Sách: {{ $cart->product->name  }}</h6></div>                
                                        <div class="product__cart--item-cont"><span>Số lượng: x{{ $cart->qty }}</span></div>
                                        <div class="product__cart--item-cont"><span>Thành tiền: {{ number_format($price) }}đ</span></div>
                                        
                                    </div>  
                                </div>     
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="cart__order--right">
                        <div class="customer mt-2">
                           <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    KHÁCH HÀNG: 
                                </div>
                                <div class="customer_infor customer__name">
                                    {{ $customer->name }}
                                </div>
                           </div>
                           <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    SỐ ĐIỆN THOẠI: 
                                </div>
                                <div class="customer_infor customer__name">
                                    {{ $customer->phone }}
                                </div>
                           </div>
                           <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    EMAIL: 
                                </div>
                                <div class="customer_infor customer__email">
                                    <i>{{ $customer->email }}</i>
                                </div>
                           </div>                            
                           <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    GHI CHÚ: 
                                </div>
                                <div class="customer_infor customer__email">
                                    <i>{{ $customer->content }}</i>
                                </div>
                           </div>                            
                            <div class="address_receive mt-2">
                                <div class="address__title">
                                    ĐỊA CHỈ NHẬN HÀNG: 
                                </div>
                                <div class="address__detail">
                                    {{ $customer->address }}
                                </div>
                            </div>               
                            <div class="info__order">
                                <i class="fa-solid fa-calendar fa-fw"></i>
                                {{ $customer->created_at }}
                                
                            </div>
                            <div class=" info__order--detail">
                                <span>Đặt hàng thành công</span>
                                <span class="span"><i>Đơn hàng đã được đặt</i></span>
                            </div>
                            <div class="address_receive mt-5">
                                <div class="address__title">
                                    TỔNG THANH TOÁN: 
                                </div>
                                <div class="address__detail">
                                    <span class="tongtien">{{ number_format($total) }}đ</span>
                                </div>
                            </div>
                            <div class="cartDetail__right mt-2">
                                <button class="btn btn-danger" type="submit"><a href="" style="color: white" onclick="huyDon(event)">Hủy đơn</a></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            @endif
        @endforeach      
    </div>
@endsection

<script>
    
    
    function huyDon(event) {
        event.preventDefault()
        const form = document.querySelector('.form');
        Swal.fire({
            title: 'Bạn có chắc muốn hủy không?',
            text: 'Yêu cầu hủy đơn sẽ gửi đến cửa hàng',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hủy đơn',
        }).then((result) => {
            if (result.isConfirmed) {
                // form.setAttribute('action', '/carts/delete');
                // form.submit();
                Swal.fire({
                    title: "Đơn đã hủy",
                    text: "Đơn hàng này của bạn sẽ không thể khôi phục",
                    icon: "success"
                });     
            }          
        });        
    };

   
</script>
