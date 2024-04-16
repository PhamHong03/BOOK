<header class="sticky-top">

    @php
        $menusHtml =  App\Helper\Helper::menus($menus);
    @endphp
    <div class="container">
        <div class="header">
            <div class="header__logo">
                <a href="/" >
                    <span class="header__logo--name">BOOK STORE</span>
                    <i class="header__logo--icon fa-solid fa-house-chimney"></i>
                </a>
            </div>

            <nav class="header__menu">
                <ul class="header__menu--list">      
                    <li class="header__menu--item header__menu--item-menu">                 
                        <i class="me-4 fa-solid fa-bars"  style="color: black; "></i>
                        <span style="color: black ;font-weight: 600;">DANH MỤC</span>                            
                        <div class="header__menu--items menu">
                            <ul class="nav__menu--list">
                                {!! $menusHtml !!}                                                                            
                            </ul>
                        </div>                            
                    </li>
                    <li class="header__menu--item">
                        <a href="{{ route('products') }}">SẢN PHẨM</a>
                    </li>
                    <li class="header__menu--item">
                        <a href="{{ route('contact') }}">LIÊN HỆ</a>
                    </li>
                </ul>
            </nav>
            <div class="header__right">
                <div class="header__cart ">
                    <a href="{{ route('carts') }}">
                        <i class="header__cart--icon fa-solid fa-cart-shopping"></i>
                        @php
                            if(is_null(Session::get('carts'))) { $productQuantity = 0; } 
                            else $productQuantity = count(Session::get('carts'));                 
                        @endphp
                        <div class="header__cart--count" 
                        data-notify="{{ $productQuantity}}"
                        >
                    </div>
                    </a>
                </div>
                <div class="header__account " style="font-weight: 600">
                    @if (Auth::check())
                        <i class="me-2 fa-solid fa-user"style="border-radius: 50%; background-color: #FFC1C2; padding:7px 8px" ></i> {{ Auth::user()->name }}
                        <div class="header__account--list">
                            <button class="button button-white"><a href="#">Trang cá nhân</a></button>
                            <button class="button button-white"><a href="{{ route('order') }}">Đơn hàng của bạn</a></button>
                            <button class="button button-red"><a href="{{ route('logout') }}">Đăng xuất</a></button>
                        </div>
                    @else
                        <i class="me-2 fa-solid fa-user"></i>
                        <div class="header__account--list">
                            <button class="button button-red"><a href="{{ route('register') }}">Đăng ký</a></button>
                            <button class="button button-red"><a href="{{ route('login') }}">Đăng nhập</a></button>
                            <button class="button button-white"><a href="{{ route('logout') }}">Đăng xuất</a></button>
                        </div>
                    @endif                        
                    
                    
                </div>
            </div>
            <div class="icon--bar">
                <i class="me-4 fa-solid fa-bars" ></i>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="nav__search ">
            <form action="{{ route('search') }}" class="input-group ">
                <input type="text" class="form-control" name="key" placeholder="Tìm sản phẩm ..." />
                <div class="input-group-append ms-2">
                    <button class="btn btn-outline-none" type="submit" >
                        <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>

</header>



    {{-- moble - table --}}
    <div class="header__mobile">
        <div class="header__mobile--close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="header__mobile--title mt-4">
            <a href="{{ route('bookstore') }}"><span class="header__logo--name ">BOOK STORE</span></a>
            <i class="   fa-solid fa-house-chimney"></i>
        </div>
        <hr>
        
        <nav class="header__menu--mobile">
                <ul class="header__menu--mobile-list">   
                    <li class="header__mobile--cart-user">
                        <div class="header__cart--mobile">
                            <a href="{{ route('carts') }}">
                                <i class="header__cart--icon fa-solid fa-cart-shopping"></i>
                                @php
                                    if(is_null(Session::get('carts'))) { $productQuantity = 0; } 
                                    else $productQuantity = count(Session::get('carts'));                 
                                @endphp
                                <div class="header__cart--count" 
                                data-notify="{{ $productQuantity}}"
                                >
                            </div>
                            </a>
                        </div>
                        <div class="header__account">
                            @if (Auth::check())
                                <i class="me-2 fa-solid fa-user"></i> {{ Auth::user()->name }}
                            @else
                                <i class="me-2 fa-solid fa-user"></i>
                            @endif                       
                            
                            <div class="header__account--list">
                                <button class="button button-white"><a href="{{ route('logout') }}">Đăng xuất</a></button>
                                <button class="button button-red"><a href="{{ route('register') }}">Đăng ký</a></button>
                                <button class="button button-red"><a href="{{ route('login') }}">Đăng nhập</a></button>
                                {{-- <button class="button button-blue"><i class="fa-brands fa-facebook-f"></i><a href="/">Đăng nhập bằng Facebook</a></button> --}}
                            </div>
                        </div>
                    </li>   
                    <li>
                        <div class=" nav__search--mobile">
                            <form action="{{ route('search') }}" class="input-group input-group--mobile">
                                <input type="text" class="form-control" name="key" placeholder="Tìm sản phẩm ..." />
                                <div class="input-group-append ms-2">
                                    <button class="btn btn-outline-none" type="submit" >
                                        <i class="fa-solid fa-magnifying-glass"></i> Tìm kiếm
                                    </button>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="header__menu--item">
                        <a href="{{ route('products') }}">SẢN PHẨM</a>
                    </li>
                    <li class="header__menu--item">
                        <a href="{{ route('contact') }}">LIÊN HỆ</a>
                    </li>
                    
                    <li class="header__menu--item header__menu--item-menu-mobile">             
                        {{-- <span style="color: black ;font-weight: 600;" class="ms-3">DANH MỤC</span>                             --}}
                        <div class="header__menu--items-mobile menu">
                            <ul class="nav__menu--list">
                                {!! $menusHtml !!}                                                                            
                            </ul>
                        </div>                            
                    </li>
                    
                </ul>
        </nav>

    </div>
  
<script>
    const btnBar = document.querySelector('.icon--bar i');
    const btnBarIcon   = document.querySelector('.header__mobile--close i');
    const headerMobile   = document.querySelector('.header__mobile');


    btnBarIcon.addEventListener("click", function() {
        headerMobile.style.display = 'none';
    });

    btnBar.addEventListener("click", function(){
        headerMobile.style.display = 'block';
    })

</script>
