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
                <div class="mb-3 align-items-center mt-2">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-user"></i><input type="text" class="form-control" name="name" placeholder="Họ và tên">
                    </div>
                    @error('name')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 align-items-center mt-2">
                    <div class="d-flex align-items-center mt-3">
                         <i class="fa-solid fa-envelope"></i><input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    @error('email')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3  align-items-center">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-phone"></i><input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                    </div>
                    @error('phone')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 align-items-center">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-key"></i> <input type="password" id="password" class="form-control" name="password" placeholder="Mật khẩu">
                    </div>
                    @error('password')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 align-items-center">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-key"></i> <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder= "Nhập lại mật khẩu">
                    </div>
                    @error('confirmPassword')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 d-flex ms-3">
                    <input type="checkbox" id="checkbox" onclick="showPassword()"> <span class="ms-1">Hiện mật khẩu</span>
                </div>
                <div class="mb-3 d-flex ms-3" style="justify-content: center">   
                    <input class="btn btn-pink" type="submit" value="Đăng ký">
                </div>

                <p class="text-center">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập</a></p>
            </form>
        </div>
    </div>    

    <script>
        function showPassword() {
            var password = document.getElementById('password');
            var checkbox = document.getElementById('checkbox');
            var confirmPassword = document.getElementById('confirmPassword');

            if(checkbox.checked) {
                password.type = "text";
                confirmPassword.type = "text";
            }else{
                password.type = "password";
                confirmPassword.type = "password";
            }
        }
    </script>

@endsection