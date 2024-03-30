@extends('head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="register__title">
                <h3>ĐĂNG NHẬP TẠI ĐÂY</h3>
            </div>
        </div>     
        <div class="register__form">
            <form action="" method="POST" class="form">
                @csrf
                <div class="mb-3 d-flex align-items-center mt-3">
                    <i class="fa-solid fa-envelope"></i><input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                </div>
                <div class="mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-key"></i> <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Mật khẩu">
                </div>
                <div class="mb-3 d-flex ms-3">
                    <input type="checkbox"> <span>Hiện mật khẩu</span>
                    <a href="" class="ms-3 text-danger">Quên mật khẩu</a>
                </div>
                <div class="mb-3 d-flex ms-3 " style="justify-content: center">   
                    <input class="btn btn-pink" type="submit" value="Đăng nhập">
                </div>

                <p class="text-center">Bạn chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></p>
            </form>
        </div>
    </div>    

@endsection