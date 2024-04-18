@extends('head')
@section('content')
    <div class="home">
        <div class="container">
             <div class="row">
                                     
                <h2 >Chào mừng bạn đến với BookStore</h2>
                <span >Khám phá điểm truy cập chính cho danh mục sách phong phú, 
                    mà còn là nơi mà cửa hàng giới thiệu các ưu đãi, khuyến mãi mới nhất, và các sản phẩm nổi bật. 
                    Thông qua trang chủ, khách hàng có thể dễ dàng tìm kiếm sách theo nhiều tiêu chí khác nhau như thể loại, 
                    tác giả, xuất bản phẩm, và đánh giá của người dùng. Ngoài ra, trang chủ cũng thường cung cấp các tính năng 
                    như hệ thống đánh giá và nhận xét, gợi ý sách dựa trên sở thích và lịch sử mua hàng của khách hàng, 
                    cũng như các tài liệu hỗ trợ và tin tức về thế giới sách mới nhất. Với thiết kế thân thiện và dễ sử dụng, 
                    trang chủ của cửa hàng sách trực tuyến không chỉ là một nền tảng mua sắm, 
                    mà còn là một không gian tương tác và thú vị cho những người đam mê sách.</span>

                <div class="button">
                    <button type="button" class="me-1 btn btn-pink btn-outline-secondary"><a href="{{ 'products' }}">Khám phá ngay</a></button>
                    <button type="button" class="btn btn-pink btn-outline-secondary"><a href="{{ route('register') }}">Đăng ký ngay</a></button>
                </div>
            </div>
        </div>
    </div>
    @php
        $menusHtml =  App\Helper\Helper::menus2($menus);
    @endphp
    {{-- <div class="container category">  
      <div class="row">
          <div class="icon">
            <i class="fa-solid fa-list"></i>
              Danh mục các sản phẩm
          </div>
      </div>    
      <div class="row">
          <div class="category_30">
            <span>{!! $menusHtml !!}</span>
          </div>
          <div class="category_70">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="product-item">
                  <div class="product-img" >
                      <img src="storage\uploads\2024\04\tubaoveminnh.jpg" alt="" class="image" >
                      <span class="product-img-sale">50%</span>
                  </div>
                  <div class="rating" >
                      <ul class="rating--list " >
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-regular fa-star"></i></li>
                      </ul>   
                  </div>
                  <h6 >Từ điển Anh - Việt</h6>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="product-item">
                  <div class="product-img" >
                      <img src="" alt="" class="image" >
                      <span class="product-img-sale">50%</span>
                  </div>
                  <div class="rating" >
                      <ul class="rating--list " >
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-regular fa-star"></i></li>
                      </ul>   
                  </div>
                  <h6 >Từ điển Anh - Việt</h6>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="product-item">
                  <div class="product-img" >
                      <img src="" alt="" class="image" >
                      <span class="product-img-sale">50%</span>
                  </div>
                  <div class="rating" >
                      <ul class="rating--list " >
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-solid fa-star"></i></li>
                          <li class="me-2 rating--item"><i class="fa-regular fa-star"></i></li>
                      </ul>   
                  </div>
                  <h6 >Từ điển Anh - Việt</h6>
                </div>
              </div>
          </div>
      </div>
        
    </div> --}}
    
    <div class="section-two">
      <div class="container">
          <div class="inner-box">
              <div class="inner-img">
                  <img src="../images/hennhauphiasautanvo.jpg" alt="">
              </div>
              <div class="inner-content">
                  <h3>--- Bán chạy nhất ---</h3>
                  <h2><i>"Hẹn Nhau Phía Sau Tan Vỡ"</i></h2>
                  <div class="inner-list">
                      <div class="inner-item">
                          <i class="fa-solid fa-palette"></i>
                          <span>Màu sắc</span>
                      </div>
                      <div class="inner-item">
                          <i class="fa-solid fa-hand-pointer"></i>
                          <span>Hướng về</span>
                      </div>
                      <div class="inner-item">
                          <i class="fa-solid fa-user-group"></i>
                          <span>Cùng nhau</span>
                      </div>
                  </div>
                  <h3>
                    'Hẹn Nhau Phía Sau Tan Vỡ'                   
                  </h3>
                  <p class="inner-desc">
                    Cuốn sách này…
                    Dành tặng những tâm hồn tan vỡ, đã yêu, đã chia ly, đã từ biệt…

                    Và lời chúc cho một cuộc hạnh ngộ đủ đầy yêu thương.
                  </p>
                  <a href="{{ route('products') }}" class="btn btn-pink">
                      Read More
                  </a>
              </div>
          </div>
      </div>
  </div>
  <div class="section-three">
    <div class="container">
        <div class="inner-box">
            <div class="inner-content"> 
                <h3>--- Được săn đón nhiều nhất ---</h3>
                <h2 class="mb-3"><a href="{{ route('products') }}">"Dường như bạn có thể điều khiển hoàng hôn"</a></h2>
                <p class="inner-desc">
                  Ai đã tấn công Cheryl 24 nhát dao rồi dùng chính chiếc xe của cô để tạo vụ tai nạn giả liên hoàn trên đại lộ Sunset.
                </p>
                <p class="inner-desc">
                  Mọi nghi vấn đổ dồn vào người đàn ông đẹp trai, thông minh, thành đạt. Con người hoàn hảo hay sát thủ hoàn hảo?
                </p>
            </div>
            <div class="inner-image">
                <a href="{{ route('products') }}"><img src="../images/chettruochoanghon.jpg" alt=""></a>
            </div>
        </div>
    </div>
  </div>
   <div class="section-four">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box-head box-head-white">
                    <h3 class="inner-title">
                      <i>Thể Loại Bán Chạy Nhất </i>
                    </h3>
                    <p class="inner-desc">
                        Giới thiệu sản phẩm theo từng danh mục bán chạy nhất đến với khách hàng tiềm năng nhất chính là mục tiêu của cửa hàng chúng tôi!
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Kinh Doanh - Kinh Tế
                    </h3>
                    <p class="inner-desc">
                        Những bài học đắc giá cho con người
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Khoa Học Viễn Tưởng
                    </h3>
                    <p class="inner-desc">
                        Khám phá thế giới rộng lớn
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Công Nghệ - Máy Tính
                    </h3>
                    <p class="inner-desc">
                        Hoà tan giữa người và máy 
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Nghệ Thuật - Thời Trang
                    </h3>
                    <p class="inner-desc">
                        Nắm bắt xu hướng thế giới
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Du Lịch - Ẩm Thực - Thế Giới
                    </h3>
                    <p class="inner-desc">
                        Khám phá ẩm thực nước bạn
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-6">
                <div class="inner-box">
                    <h3 class="inner-title">
                        Kỹ Năng Sống - Sinh Tồn
                    </h3>
                    <p class="inner-desc">
                        Bí mật nơi đảo hoang chưa ai khám phá
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="carousel-home">
  <div class="container">
    <h3 > Các phản hồi từ khách hàng về BookStore</h3>
    <div class="carousel">            
        <div id="carouselExample" class="carousel slide carousel_width">
          <div class="carousel-inner d-flex">
            <div class="carousel-item active  ">
              <span class="d-block w-100">"Cuốn sách này thực sự là một cống hiến đối với lịch sử nghệ thuật. Tôi rất ấn tượng với cách tác giả trình bày và phân tích các tác phẩm nghệ thuật nổi tiếng, làm cho tôi hiểu sâu hơn về nguồn gốc và ý nghĩa của chúng."</span>
            </div>
            <div class="carousel-item">
              <span class="d-block w-100">"Tôi đã mua cuốn sách này sau khi đọc những đánh giá tích cực và thật sự không hối hận về quyết định của mình. Nội dung rất sâu sắc và cung cấp cái nhìn mới mẻ về chủ đề mà tôi quan tâm."</span>
            </div>
            <div class="carousel-item">
              <span class="d-block w-100">Tôi muốn chia sẻ rằng cuốn sách này đã thực sự thay đổi cách suy nghĩ của tôi về cuộc sống. Những lời khuyên và kinh nghiệm được chia sẻ trong đó đã giúp tôi hiểu rõ hơn về bản thân và cách phát triển bản thân mình."</span>
            </div>
            <div class="carousel-item">
              <span class="d-block w-100">"Sách này đã khiến tôi suy nghĩ sâu về ý nghĩa của cuộc sống và giá trị thực sự của những mối quan hệ con người. Tôi rất biết ơn vì đã có cơ hội đọc nó."</span>
            </div>
          </div>
          <button class="carousel-control-prev button_next_back " type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon dark" aria-hidden="true"></span>
            <span class="visually-hidden" >Previous</span>
          </button>
          <button class="carousel-control-next button_next_back" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon dark" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>
  </div>
</div>


@endsection
