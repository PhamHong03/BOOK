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
