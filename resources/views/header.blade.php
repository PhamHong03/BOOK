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
                <div class="header__account">
                    @if (Auth::check())
                        <i class="me-2 fa-solid fa-user"></i> {{ Auth::user()->name }}
                    @else
                        <i class="me-2 fa-solid fa-user"></i>
                    @endif
                        
                    
                    <div class="header__account--list">
                        <button class="button button-red"><a href="{{ route('logout') }}">Đăng xuất</a></button>
                        <button class="button button-red"><a href="{{ route('register') }}">Đăng ký</a></button>
                        <button class="button button-white"><a href="{{ route('login') }}">Đăng nhập</a></button>
                        <button class="button button-blue"><i class="fa-brands fa-facebook-f"></i><a href="/">Đăng nhập bằng Facebook</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="nav__search">
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