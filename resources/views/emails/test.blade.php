<style>
    
    .cart_order{
      background-color: #dcdada;
    }
    .cartDetail
    {
  
      display: flex;
      margin: 10px 30px;
      border-bottom: 1px solid #ccc;
      padding: 10px 0px;
    }
    .cartDetail__left{
      flex: 50%;
      
    }
    .cartDetail__right{
      flex: 50%;
      margin-left: 50px;
      text-transform: uppercase;
      font-weight: 600;
  }
    
  .cartDetail__right span{
      float: right;
  }
  
  .cartDetail__right button{
      float: right;
  }
  .order{
      display: flex;
  }
  
  
  .cart__order--left{
      flex: 50%;
  }
  .cart__order--right{
      flex: 50%;
  }
  .info__order{
      margin-left: 30px;
      color: var(--green3) ;
      font-weight: 600;
  }
  .info__order--detail{
      display: flex;
      flex-direction: column;
      margin-left: 60px;
      color: var(--green3) ;
      font-weight: 600;
  
  }
  .info__order--detail .span{
      color: rgb(95, 146, 19);
  }
  
  .address_receive{
      display: flex;
  }
  
  .cart__order--right .address__title{
      margin-left: 30px;
      font-weight: 600;
      font-size: 1.4rem;
      flex: 50%;
  }
  .cart__order--right .address__detail{
      font-size: 1rem;
      flex: 50%;
  }
  
  .customer_infor{
      display: flex;
  }
  .customer__name{
      flex: 50%;
      font-size: 1.2rem;
      text-transform: uppercase;
  }
  .customer__title{
      margin-left: 30px;
      font-weight: 600;
      font-size: 1rem;
      flex: 50%;
  }
  .customer__email{
      flex: 50%;
  }
  .tongtien{
      border: 1px solid #222;
      padding: 10px 30px;
      width: 50%;
      background-color: var(--green3);
      color: var(--white);
      border-radius: 5px;
      font-size: 1.4rem;
  }
  
  
  .order__off--me{
      text-align: center;
      color: #0b3d06;
      text-transform: uppercase;
      font-size: 1.8rem;
      margin-top: 20px;
  }
  </style>

<div style="
    width: 500px;
    margin: 0 auto;
    padding: 15px;
    text-align: center;
">    

    <h2>Xin chào {{  $name }}</h2>
    <h3>Chúng tôi xin gửi hóa đơn đặt hàng đến bạn</h3>
    
</div>
    @php
        $total = 0;
    @endphp
    @foreach ( $customers as $customer )
            @if ($customer->email == $users->email)
                <div class="cartDetail">
                    <div class="cartDetail__left mt-2">
                        <span><strong>MÃ ĐƠN HÀNG: </strong>{{ $customer->id }}0123456789abc</span><br>
                        <span>Trạng thái :</span>
                        @if ( $customer->status  == 0 )
                            <span style="color: blue">Chờ xác nhận</span>
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
                                    <div class="product__cart--item product__cart--item-con">
                                        <div class="product__cart--item-cont"><p>Sách: {{ $cart->product->name  }}, Số lượng: x{{ $cart->qty }}, Thành tiền: {{ number_format($price) }}đ</p></div>                
                                      
                                    </div>  
                                </div>  
                            @endif

                        @endforeach
                    </div>
                    
                    <div class="cart__order--right">
                        <div class="customer mt-2">
                            <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    KHÁCH HÀNG: {{ $customer->name }}
                                </div>
                            </div>
                            <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    SỐ ĐIỆN THOẠI: {{ $customer->phone }}
                                </div>
                            </div>
                            <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    EMAIL: <i>{{ $customer->email }}</i>
                                </div>
                            </div>                            
                            <div class="customer_infor">
                                <div class="customer_infor customer__title">
                                    GHI CHÚ: <i>{{ $customer->content }}</i>
                                </div>                                
                            </div>                            
                            <div class="address_receive mt-2">
                                <div class="address__title">
                                    ĐỊA CHỈ NHẬN HÀNG:  {{ $customer->address }}
                                </div>
                            </div>               
                            <div class="info__order">
                                <i class="fa-solid fa-calendar fa-fw"></i>
                                {{ $customer->created_at }}
                                
                            </div>
                            <div class="address_receive mt-5">
                                <div class="address__title">
                                    TỔNG THANH TOÁN: <span class="tongtien" style="color: red">{{ number_format($total) }}đ</span>
                                </div>
                            </div>                        
                        </div>
                        
                    </div>
                </div>            
            @endif
    @endforeach  


    <p style="color: red;font-weight:600">Quý Khách hàng vui lòng kiểm tra thông tin hóa đơn, nếu có sai sót liên hệ ngay (036) 910287653 line 131 trong vòng 10 ngày kể từ ngày phát hành hóa đơn. Sau thời gian này, mọi khiếu nại của Quý Khách BOOKSTORE xin từ chối giải quyết. Mong quý khách thông cảm! </p>
    <span style="font-weight: 600">Chú ý: <i>Đây là email tự động từ hệ thống. Quý khách vui lòng không trả lời email này.</i></span><br>
    <p>Cảm ơn bạn đã đồng hành cùng BookStore, đơn hàng của bạn sẽ được phê duyệt trong ít thời gian tới, bạn vui lòng
        đợi BookStore nhé. Xin chân thành cảm ơn!
    </p>
    <p>Trân trọng!</p>
    <span>Hệ thống điện tử từ BOOKSTORE</span><br>
    <span>Được cung cấp bởi CỬA HÀNG SÁCH TRỰC TUYẾN</span><br>
    <span>Webiste: <a href="" style="color: blue">bookstore.vn</a> - Tổng đài hỗ trợ 0366182451</span>