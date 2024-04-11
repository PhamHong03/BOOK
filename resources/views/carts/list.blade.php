
@extends('head')
@section('content')
<form  method="POST" id="form" class="form">     
    <div class="container">
        <div class="row">
            @include('admin.alert')    
            <div class="col-lg-8 col-12">
                @if(count($products) != 0)
                @php
                    $freeShip = 0;
                    $total = 0;
                    $total_ship = 0;
                    
                @endphp 
                <div class="container cart ">    
                    <div class="product__cart  me-5">               
                        <div class="row">           
                            <div class="product__cart product__cart--group">
                                <input class=" me-2 btn btn-danger btn-delete" id="delete-all" name="delete-all" 
                                onclick="onDeleteAll(event)" value="Xóa tất cả"></input>
                                @csrf
                                <input class="btn btn-success btn-update me-1" type="submit" onclick="updateCart()"  value="Cập nhật giỏ hàng" formaction="/update-cart">
                                <input type="submit" class="btn btn-pink me-1" value="Đơn hàng của tôi" >
                            </div>
                        </div> 
                        @foreach ($products as $key => $product )         
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
                                        <img src="{{ $product->thumnb }}" alt=""></div>
                                    <div class="product__cart--item product__cart--item-con">
                                        <div class="product__cart--item-cont"><h5>Tên: {{ $product->name }}</h5></div>                
                                        <div class="product__cart--item-cont"><span>Giá: {!! App\Helper\Helper::price_sal($product->price, $product->price_sale) !!}đ</span></div>
                                        <div class="product__cart--item-cont"><span>Tổng giá tiền: {{ number_format($priceEnd) }}đ</span></div>
                                        
                                        <div class="quantity mt-3">
                                            <div class="btn-group btn-quantity">
                                                <button id="button-minus" type="button"  class="btn-change button-minus" style="border-right: 1px solid rgba(0, 0, 0, 0.15)">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input class="num-product" name="num_product[{{ $product->id }}]"  id="num-product" value="{{ $carts[$product->id] }}" >
                                                <button id="button-plus" type="button" class="btn-change button-plus" style="border-left: 1px solid rgba(0, 0, 0, 0.15)">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                                {{-- @csrf --}}
                                            </div> 
                                        </div>
                                    </div>                    
                                    <div class="product__cart--item product__cart--item-btn">
                                        <button class="btn btn-danger btn-delete"><a href="/carts/delete/{{ $product->id }}" style="color: white">Xóa</a></button>
                                    </div>
                                    <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                                </div>                 
                            </div>
                        @endforeach
                    </div>  
                    {{-- <div class="product__left ">
                        <div class="product__left--title">
                            <h3 >Tổng sản phẩm</h3>
                            <div class="product__cart--head"></div>
                            <div class="product__left--list">
                                <ul class="product__left--item-list mt-3 me-5">
                                    <li class="product__left--item">
                                        <input class="p-2" type="radio" value="doanhnghiep" name="loaiKhachHang"> Doanh Nghiệp Lớn
                                        
                                        <input class="p-2" type="radio" value="khachhangthuong" name="loaiKhachHang"> Khách Hàng Bình Thường
                                    </li>
                                    <li class="product__left--item">
                                        <label for="name"><span>Tên khách hàng:</span> </label>
                                        <input class="p-2" type="text" name="name" placeholder="Tên khách hàng" >
                                    </li>
                                    <li class="product__left--item">
                                        <label for="email"><span>Email: </span> </label>
                                        <input class="p-2" type="email" name="email" placeholder="Email" >
                                    </li>
                                    <li class="product__left--item">
                                        <label for="sdt"><span>Số điện thoại: </span> </label>
                                        <input class="p-2" type="text" name="phone" placeholder="Số điện thoại" >
                                    </li>
                                    <li class="product__left--item">
                                        <label for="address"><span>Địa chỉ nhận hàng: </span> </label>
                                        <input class="p-2" type="text" name="address" placeholder="Địa chỉ nhận hàng" >
                                    </li>
                                    <li class="product__left--item">
                                        <label for="content"><span>Ghi chú: </span> </label>
                                        <textarea class="p-2" type="text" name="content" ></textarea>
                                    </li>
                                    <li class="product__left--item">
                                        <span>Tổng giá: </span>                               
                                        <span class="me-5">{{ number_format($total) }}đ</span>
                                    </li>
                                    <li class="product__left--item d-flex">
                                        <span class="uct__left--item"><i>Phí vận chuyển:</i> </span>
                                        <div class="product__left--item-checkbox me-5">{{ number_format($ship) }}đ                
                                        </div>
                                    </li>
                                    <li class="product__left--item">
                                        <span>Tổng vận chuyển: </span>
                                        <span class="me-5">{{ number_format($total_ship) }}đ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success bmtn-confirm " id="pay-all" name="pay-all" type="submit"  style="width: 40%;" >Đặt hàng</button>
                    </div>            --}}
                </div>
            </div> 
            <div class="col-lg-4 col-12">
                <div class="detailOrder__title-1 ">
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
                            <select name="city" id="" class="p-2" name="address">
                                <option value="city">Thành phố</option>
                                <option value="city">Thành phố Cần Thơ</option>
                                <option value="city">Thành phố Hồ Chí Minh</option>
                                <option value="city">Thành phố Đà Nẵng</option>
                                <option value="city">Thành phố Huế</option>
                            </select>
                        </li>
                        <li class="detailOrder__info--item" >
                            <select name="province" id="" class="p-2" name="address">
                                <option value="province">Tỉnh thành </option>
                                <option value="province">Tỉnh An Giang</option>
                                <option value="province">Tỉnh Cà Mau</option>
                                <option value="province">Tỉnh Sóc Trăng</option>
                                <option value="province">Tỉnh Vĩnh Long</option>
                            </select>
                        </li>
                        <li class="detailOrder__info--item">
                            <input class="p-2" type="text" name="address" placeholder="Ấp, phường xã, ..." >
                        </li>

                        <li class="detailOrder__info--item">
                            <textarea class="p-2" type="text" name="content" placeholder="Ghi chú"></textarea>
                        </li> 
                    </ul>
                </div>
                <div class="detailOrder__title ">
                    <h4>Vận chuyển</h4>
                </div>
                <div class="a d-flex" style="justify-content: space-between">
                    <div class=""><input type="radio" id="freeshipCheck" class="freeshipCheck" name="freeshipCheck" value="">Miễn phí vận chuyển </div>
                    <span onclick="appFreeShip()" class="freeship" ><i>Áp mã freeship</i></span>
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
                <div class="total__price">
                    <div class="total__price--ship">
                        <span>Tạm tính</span>
                        <span>{{ number_format($total) }}đ</span>
                    </div>
                    <div class="total__price--ship">
                        <span>Vận chuyển</span>                        
                            <span>{{ number_format($ship) }}đ</span>                       
                        
                    </div>
                    <div class="total__price--sum">
                        <span>Tổng tiền: </span>
                        <span>{{ number_format($total_ship) }}đ</span>
                    </div>
                    <div class="total__price-finaly d-flex">
                        <a href="{{ route('products') }}">Thêm sản phẩm</a>
                        <button class="btn btn-success bmtn-confirm " id="pay-all" name="pay-all" type="submit"  style="width: 40%;" >Đặt hàng</button>
                    </div>
                </div>

            </div>
            
             
        </form>
                @else
                    <div class="text-center">        
                        <img style="justify-content: center" src="/template/images/empty-cart-logo.jpg" alt="">
                        <h2 class="text-center">Giỏ hàng đang trống rỗng.<a href="{{ route('products') }}" class="ms-2" style="color: green" >CLICK VÀO ĐÂY NHÉ!</a></h2>
                    </div>
                @endif    
            </div>
        </div>
    </div>   
    
   
<script src="/template/js/cart.js"></script>


<script>
    
    function appFreeShip() {        
        var checkbox = document.getElementById('freeshipCheck');
        checkbox.checked = 1;
        freeShip = 1;
    }
    function onDeleteAll(event) {
        event.preventDefault()
        const form = document.querySelector('.form');
        Swal.fire({
            title: 'Bạn có chắc muốn xóa tất cả?',
            text: 'Bạn không thể khôi phục giỏ hàng được nữa!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes! Delete all',
        }).then((result) => {
            if (result.isConfirmed) {
                form.setAttribute('action', '/carts/delete');
                form.submit();
                Swal.fire({
                    title: "Xóa tất cả!",
                    text: "Giỏ hàng của bạn sẽ trống ngay lập tức.",
                    icon: "success"
                });
            }          
        });        
    };

   
</script>




@endsection

