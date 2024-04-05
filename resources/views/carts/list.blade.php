@extends('head')
@section('content')
<form  method="POST" id="form" class="form">    
    @include('admin.alert')    
    @if(count($products) != 0)
        @php
            $total = 0;
            $total_ship = 0;
        @endphp 
        <div class="container cart">    
            <div class="product__cart me-5">               
                <div class="row">           
                    <div class="product__cart product__cart--group">
                        <input class=" me-2 btn btn-danger btn-delete" id="delete-all" name="delete-all" 
                        type="submit" onclick="onDeleteAll()" formaction="/carts/delete" value="Xóa tất cả" ></input>
                        @csrf
                        <input class="btn btn-success  me-1" type="submit" onclick="updateCart()"  value="Cập nhật giỏ hàng" formaction="/update-cart">
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
                                {{-- <button class="btn btn-success btn-confirm" ><a href="/carts/update/{{ $product->id }}" style="color: white" >Xác nhận</a></button> --}}
                                <button class="btn btn-danger btn-delete"><a href="/carts/delete/{{ $product->id }}" style="color: white">Xóa</a></button>
                            </div>
                            <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                        </div>                 
                    </div>
                @endforeach
            </div>  
            <div class="product__left">
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
                                <span class="uct__left--item">Phí vận chuyển: </span>
                                <div class="product__left--item-checkbox me-5">{{ number_format($ship) }}đ
                                    {{-- <div class="">
                                        <input type="radio" name="business" value="freeship" >
                                        <label for="ship">{{ $ship }}</label>
                                    </div> --}}
                                    {{-- <div class="">
                                        <button class="btn btn-light">Mã giảm giá</button>
                                    </div> --}}
                                </div>
                            </li>
                            <li class="product__left--item">
                                <span>Tổng vận chuyển: </span>
                                <span class="me-5">{{ number_format($total_ship) }}đ</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-success bmtn-confirm" id="pay-all" name="pay-all" onclick="payAll()" type="submit" >Thanh Toán</button>
            </div>           
        </div>  
       
    </form>
@else
    <div class="text-center">        
        <img style="justify-content: center" src="/template/images/empty-cart-logo.jpg" alt="">
        <h2 class="text-center">Giỏ hàng đang trống rỗng.<a href="{{ route('products') }}" class="ms-2" style="color: green" >CLICK VÀO ĐÂY NHÉ!</a></h2>
    </div>
    @endif    
<script src="/template/js/cart.js"></script>


<script>
    function onDeleteAll(event) {
        // event.preventDefault();
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
                
                Swal.fire({
                    title: "Xóa tất cả!",
                    text: "Giỏ hàng của bạn sẽ trống ngay lập tức.",
                    icon: "success"
                });
            }          
        });        
    };

    function payAll() {
        Swal.fire({
           icon: 'success',
           text: 'Thanh toán thành công',
           showConfirmButton: false,
           timer: 2000
       });
    }
   
</script>




@endsection

