@extends('head')
@section('content')
    <div class="container mt-4">
        <h3 class=" text-center" style="color: palevioletred">Thông tin cá nhân của bạn!</h3>

    </div>
    <div class="container profile_id ">
        <div class="trangcanhan d-flex">
            <div class="img-upload">
                <div class="image">
                    <img src="../images/images.png" alt="IMG UPLOAD">
                    
                </div>
                
            </div>
            <div class="profile">
                @if (Auth::check())
                <div class="profile__item"><i>Tên của bạn:</i> <strong>{{ Auth::user()->name }}</strong></div>
                <div class="profile__item"><i>Email của bạn: </i> <strong>{{ Auth::user()->email }}</strong></div>
                <div class="profile__item"><i>Vai trò: </i> <a href="{{ route('bookstore') }}"><strong>Khách hàng tiềm năng</strong></a></div>
                @endif
            </div>
        </div>
    </div>
@endsection
