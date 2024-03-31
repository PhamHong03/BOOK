@extends('head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="register__title">
                <h3>RẤT VUI KHI ĐĂNG KÝ TÀI KHOẢN CÙNG BẠN</h3>
                <span>Hãy điền đầy đủ thông tin đăng ký  nhé!</span>
            </div>
        </div>     
        <div class="register__form">
            <form action="" method="POST" class="form">
                @csrf
                <div class="mb-3 d-flex align-items-center mt-2">
                    <i class="fa-solid fa-user"></i><input type="text" class="form-control" name="name" placeholder="Họ và tên">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-envelope"></i><input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-phone"></i><input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                </div>
                {{-- <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-location-dot"></i><input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                </div> --}}
                <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-key"></i> <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-key"></i> <input type="password" class="form-control" name="confirmPassword" placeholder= "Nhập lại mật khẩu">
                </div>
                <div class="mb-3 d-flex ms-3">
                    <input type="checkbox"> <span>Hiện mật khẩu</span>
                </div>
                <div class="mb-3 d-flex ms-3" style="justify-content: center">   
                    <input class="btn btn-pink" type="submit" value="Đăng ký">
                </div>

                <p class="text-center">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>
            </form>
        </div>
    </div>    

@endsection