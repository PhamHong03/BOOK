@extends('head')
@section('content')
   <div class="container">
    <h3 class="text-center">Chi Tiết Đơn Hàng</h3>
    {{-- <div class="detailOrder">
        <div class="row">
            <div class="col-lg-5 col-12">
                <div class="detailOrder__title">
                    <h4>Đơn hàng (3 sản phẩm)</h4>
                </div>
                @php
                    $freeShip = 0;
                    $total = 0;
                    $total_ship = 0;                    
                @endphp 
                @foreach ($carts as $key => $product )         
                            @php                    
                                $price = App\Helper\Helper::price_s($product->price, $product->price_sale);
                                $priceEnd = floatval($price) *  $carts[$product->id] ;
                              
                                $total += $priceEnd;

                                $ship = floatval(42000);
                                
                                $total_ship = $total + $ship;                        
                            @endphp
                            <div class="row">                        
                                <div class="product__cart product__cart--body ">
                                    <div class="product__cart--item product__cart--item-img">
                                        <input type="checkbox" checked>
                                        <img src="{{ $product->thumnb }}" alt="" style="height:100px; width:100px"></div>
                                    <div class="product__cart--item product__cart--item-con">
                                        <div class="product__cart--item-cont"><h5>Tên: {{ $product->name }}</h5></div>                
                                        <div class="product__cart--item-cont"><span>Giá: {!! App\Helper\Helper::price_sal($product->price, $product->price_sale) !!}đ</span></div>
                                        
                                        <div class="quantity">
                                            x {{ $carts[$product->id] }}
                                        </div>
                                    </div>                    
                                    <div class="product__cart--item product__cart--item-btn">
                                        <button class="btn btn-danger btn-delete"><a href="/carts/delete/{{ $product->id }}" style="color: white">Xóa</a></button>
                                    </div>
                                    <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                </div>                 
                            </div>
                        @endforeach
                <div class="total__price-order">
                    <div class="total__price-finaly d-flex">
                        <a href="{{ route('carts') }}">Về trang giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="detailOrder__title">
                    <h4>Thông tin giao hàng</h4>
                </div>
                <div class="detailOrder__info">
                    <ul>
                        <li class="detailOrder__info--item">
                            <input class="p-2" type="text" name="name" placeholder="Tên khách hàng" >
                        </li>
                        <li class="detailOrder__info--item">
                            <input class="p-2" type="email" name="email" placeholder="Email" >
                        </li>
                        <li class="detailOrder__info--item">
                            <input class="p-2" type="text" name="phone" placeholder="Số điện thoại" >
                        </li>
                        
                        <li class="detailOrder__info--item">
                            <input class="p-2" type="text" name="description" placeholder="Ấp, phường xã, ..." >
                        </li>

                        <li class="detailOrder__info--item">
                            <textarea class="p-2" type="text" name="content" placeholder="Ghi chú"></textarea>
                        </li> 
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="detailOrder__title ">
                    <h4>Vận chuyển</h4>
                </div>
                <div class="a d-flex" style="justify-content: space-between">
                    <div class=""><input type="radio" id="freeshipCheck" class="freeshipCheck" value="">Miễn phí vận chuyển </div>
                    <span onclick="appFreeShip()" class="freeship"><i>Áp mã freeship</i></span>
                </div>
                <div class="detailOrder__title mt-4">
                    <h4>Thanh Toán</h4>
                </div>
                <div class="a">
                    <input type="radio" name="pay" checked value="ship"> Thanh toán khi nhận hàng
                </div>
                <div class="a">
                    <input type="radio" name="pay" value="ship" > Thanh toán bằng thẻ tín dụng
                </div>

            </div>
           
        </div>
    </div> --}}
    <div class="customer mt-2">
        {{-- <ul>
            <li>Tên khách hàng : <strong>{{ $customers->name }}</strong></li>
            <li>Số điện thoại : <strong>{{ $customers->phone }}</strong></li>
            <li>Địa chỉ : <strong>{{ $customers->address }}</strong></li>
            <li>Email : <strong>{{ $customers->email }}</strong></li>
            <li>Ghi chú : <strong>{{ $customers->content }}</strong></li>
        </ul> --}}
    </div>
    @php
        $total = 0;
        $total_ship = 0;
    @endphp 
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
                        {{-- @php                 
                            $price = floatval($cart->price) *  $cart->qty;
                            
                            $total += $price;
                            $ship = floatval(42000);

                            $total_ship = $total + $ship;                        
                        @endphp           --}}
                        
                        <tr class="table_row ">
                            <td class="column-1 table_admin ">
                                <div class="how_itemcart1">
                                    {{-- <img src="{{ $cart->product->thumnb }}" alt="IMG" style="width: 70px"> --}}
                                </div>
                            </td>
                            {{-- <td class="column-2 table_admin">{{ $cart->product->name }}</td> --}}
                            <td class="column-3 table_admin">{{ number_format($cart->price)}}đ</td>
                            <td class="column-4 table_admin">x{{ $cart->qty }}</td>
                            {{-- <td class="column-3 table_admin">{{ number_format($price) }}đ</td> --}}
                        </tr>                                    
                    @endforeach
                    <tr style="font-size: 1.4rem">
                        <td colspan="4" class="text-red text-right"><strong>Tổng thanh toán:</strong> </td>
                        {{-- <td style="width:100px"><strong>{{ number_format($total) }}đ</strong></td> --}}
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <button class=" btn btn-success " id="btn-delivery" style="float: right" onclick="duyetdon(event)">Giao hàng</button>

    </div>
</div>
@endsection

<script>
     function appFreeShip() {        
            var checkbox = document.getElementById('freeshipCheck');
            checkbox.checked = 1;
        }

    const form = document.querySelector('.form');
   
    
    form.addEventListener("submit", function(event) {
       console.log("hi");
        event.preventDefault(); 
        Swal.fire({
            icon: 'success',
            text: 'Đặt hàng thành công',
            showConfirmButton: false,
            timer: 2000
        });
    });
   
</script>