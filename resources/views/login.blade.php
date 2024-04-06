@extends('head')
@section('content')
    <div class="container">
        <div class="row">
            <div class="register__title">
                <h3>ĐĂNG NHẬP TẠI ĐÂY</h3>
                <span>Hãy điền đầy đủ thông tin đăng nhập nhé!</span>
                
            </div>
        </div>     
        <div class="register__form">
            <form action="" method="POST" class="form">
                @include('admin.alert');
                @csrf
                <div class="mb-3 align-items-center mt-3">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-envelope"></i><input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                    </div>
                    @error('email')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 align-items-center">
                    <div class="d-flex align-items-center mt-3">
                        <i class="fa-solid fa-key"></i> <input  type="password" name="password" id="password" class="form-control" id="exampleFormControlInput1" placeholder="Mật khẩu">
                    </div>
                    @error('password')
                        <div class="ms-5 text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 d-flex ms-3">
                    <input type="checkbox" id="checkbox" onclick="showPassword()"> <span class="ms-1">Hiện mật khẩu</span>
                    <a href="" class="ms-3 text-danger">Quên mật khẩu</a>
                </div>
                <div class="mb-3 d-flex ms-3 " style="justify-content: center">   
                    <input class="btn btn-pink" type="submit" value="Đăng nhập">
                </div>

                <p class="text-center">Bạn chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></p>
            </form>
        </div>
    </div>    
    <script>
        function showPassword() {
            var password = document.getElementById('password');
            var checkbox = document.getElementById('checkbox');

            if(checkbox.checked) {
                password.type = "text";
            }else{
                password.type = "password";
            }
        }
    </script>
@endsection