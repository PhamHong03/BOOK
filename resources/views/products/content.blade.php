@extends('head')

@section('content')

    <div class="container">
        <div class="bread-crumb p-3 ">
            <a href="/">Trang chủ
                <i class="fa-solid fa-angle-right"></i>    
            </a>
            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html">
                {{ $product->menu->name }}
                <i class="fa-solid fa-angle-right"></i>
            </a>
            <a href="">
                {{ $title }}
            </a>
        </div> 
    </div>
    <div class="container flex-wrap">        
       <div class="row">
            <div class="content">            
                <div class="content__left ">
                    <img src="{{ $product->thumnb }}" alt="" class="product-img p-t-20 p-b-20">                                   
                </div>            
                <div class="content__right ">
                    <h3 class="mt-2"><i>Danh mục: {{ $product->menu->name }}</i></h3>
                    <h2 class="mt-2">Tác phẩm: {{ $product->name }}</h2>
                    <p class="mt-3">Tác giả: {{ $product->author }}</p>
                    <p class="mt-2">Nhà xuất bản: {{ $product->publisher }}</p>
                    <div class="price mt-2"> Giá: 
                        <span class="price_detail" style="color: red">{!! App\Helper\Helper::price_sal($product->price, $product->price_sale) !!}VND</span>
                        <span class="price_detail" style="color:#999;text-decoration: line-through"> {!! \App\Helper\Helper::price_price($product->price) !!}VND</span>
                        <span class="price_per ms-3" >Giảm: {{ $product->price_sale }}%</span>
                    </div>
                    <div class="delivery mt-2">
                        <p>Vận chuyển: Vận chuyển trong nước </p>
                    </div>
                    <div class="policy mt-2">
                        <p>Chính sách đổi trả trong vòng 30 ngày! <a href="" class="me-1 " style="color: blue">Xem thêm tại đây!</a></p>
                    </div>
                    <form action="/add-cart" method="POST" id="add-to-cart">
                        <div class="quantity mt-3">
                            <span style="margin-right: 20px; font-size: 18px; font-weight: 300"
                                >Số lượng:
                            </span>
                            <div class="btn-group btn-quantity">
                                <button id="button-minus" type="button"  class="btn-change button-minus" style="border-right: 1px solid rgba(0, 0, 0, 0.15)">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input class="num-product" name="num-product"  id="num-product" value="1">
                                <button id="button-plus" type="button" class="btn-change button-plus" style="border-left: 1px solid rgba(0, 0, 0, 0.15)">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div> 
                        </div>
                        <div class="button-cart d-flex mt-3">
                            <button type="submit" class="p-2 btn-success btn-success-add-cart" id="btn-add-cart" ><i class="me-2 fa-solid fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                           
                            <input class="p-2 btn-danger ms-2 text-center btn-danger-buy-now" value="Mua ngay" >
                        </div>                        
                        <input type="hidden" class="product_id" name="product_id" value="{{ $product->id }}">
                        @csrf
                    </form>
                </div>
            </div>
       </div>
       <div class="row desc">
            <div class="description--title">
                <h4 class="text-center">Tìm hiểu một ít về "{{ $product->name }}"  </h4>
            </div>
            <div class="description">
                <p> {{ $product->description }} </p> 
                {!! html_entity_decode($product->content) !!}
            </div>          
       </div>       
    </div>
   <section>
    <div class="container">
        <h2 class="text-center mt-2"><i>Sản phẩm liên quan</i></h2>
        @include('products.list')
    </div>
   </section>


<script src="{{asset('template/js/cart.js')}}"></script>
<script>
    document.getElementById("add-to-cart").addEventListener("submit", function(event) {
    //    event.preventDefault(); 
    if({{ Auth::check() }}){
        Swal.fire({
           icon: 'success',
           text: 'Thêm giỏ hàng thành công',
           showConfirmButton: false,
           timer: 2000
       });
    }
       
    });
</script>

@endsection





