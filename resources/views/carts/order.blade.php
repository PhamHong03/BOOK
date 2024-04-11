@extends('head')
@section('content')

   <form action="" method="POST" id="form" class="form">
        <div class="container">
            <div class="detailOrder">
                <div class="row">
                    <h3 class="ms-4">Đặt hàng</h3>
                </div>
                <div class="row">
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
                                    <select name="city" id="" class="p-2">
                                        <option value="city">Thành phố</option>
                                        <option value="city">Thành phố Cần Thơ</option>
                                        <option value="city">Thành phố Hồ Chí Minh</option>
                                        <option value="city">Thành phố Đà Nẵng</option>
                                        <option value="city">Thành phố Huế</option>
                                    </select>
                                </li>
                                <li class="detailOrder__info--item">
                                    <select name="province" id="" class="p-2">
                                        <option value="province">Tỉnh thành </option>
                                        <option value="province">Tỉnh An Giang</option>
                                        <option value="province">Tỉnh Cà Mau</option>
                                        <option value="province">Tỉnh Sóc Trăng</option>
                                        <option value="province">Tỉnh Vĩnh Long</option>
                                    </select>
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
                    <div class="col-lg-5 col-12">
                        <div class="detailOrder__title">
                            <h4>Đơn hàng (3 sản phẩm)</h4>
                        </div>
                        <div class="detailOrder__cart">
                            <img src="/template/admin/dist/img/hong.jpg" alt="" style="width:70px">
                            <div class="detailOrder__cart--name">
                                Ceo Trung Quốc Ii - Bài Học Kinh Nghiệm
                            </div>
                            <div class="detailOrder__cart--description">
                                <div class="price">90,000đ</div>
                                <div class="quantity ">4</div>
                                <div class="price__tol">360,000đ</div>
                            </div>
                        </div>
                        <div class="detailOrder__cart">
                            <img src="/template/admin/dist/img/hong.jpg" alt="" style="width:70px">
                            <div class="detailOrder__cart--name">
                                Ceo Trung Quốc Ii - Bài Học Kinh Nghiệm
                            </div>
                            <div class="detailOrder__cart--description">
                                <div class="price">90,000đ</div>
                                <div class="quantity ">4</div>
                                <div class="price__tol">360,000đ</div>
                            </div>
                        </div>
                        <div class="detailOrder__cart">
                            <img src="/template/admin/dist/img/hong.jpg" alt="" style="width:70px">
                            <div class="detailOrder__cart--name">
                                Ceo Trung Quốc Ii - Bài Học Kinh Nghiệm
                            </div>
                            <div class="detailOrder__cart--description">
                                <div class="price">90,000đ</div>
                                <div class="quantity ">4</div>
                                <div class="price__tol">360,000đ</div>
                            </div>
                        </div>

                        <div class="total__price">
                            <div class="total__price--ship">
                                <span>Tạm tính</span>
                                <span>369,000đ</span>
                            </div>
                            <div class="total__price--ship">
                                <span>Vận chuyển</span>
                                <span>0đ</span>
                            </div>
                            <div class="total__price--sum">
                                <span>Tổng tiền: </span>
                                <span>360,000đ</span>
                            </div>
                            <div class="total__price-finaly d-flex">
                                <a href="{{ route('carts') }}">Về trang giỏ hàng</a>
                                <button class="btn btn-success" type="submit">Thanh toán</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @csrf
   </form>
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