@extends('head')
@section('content')
    <div class="container">
        <div class="contact">
            <div class="contact__left">
                <div class="infor-location-map">
                    <iframe
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15715.726391463735!2d105.77034015000002!3d10.022503510436318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089bb88b20641%3A0xf542c24683b038a7!2sPhuc%20Long%20coffee%20%26%20Tea!5e0!3m2!1sen!2s!4v1693972580039!5m2!1sen!2s"
                      class="map"
                      width="600"
                      height="490"
                      style="border: 0"
                      allowfullscreen=""
                      loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                  </div>
            </div>
            <div class="contact__right">                
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <h4 class="text-center">Hãy liên hệ với chúng tôi nếu bạn có bất kỳ thất mắc nào!</h4>
                <div class="contact__form">
                    <form action="contact" method="POST" class="form" id="form">
                        @csrf
                        <div class="mb-3 align-items-center mt-3">
                            <div class="d-flex align-items-center mt-3">                                
                                <i class="fa-solid fa-user"></i><input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleFormControlInput1" placeholder="Tên của bạn">
                            
                            </div>
                            @error('name')
                                    <div class="ms-3 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 align-items-center">
                            <div class="d-flex align-items-center mt-3">
                                <i class="fa-solid fa-envelope"></i><input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" placeholder="Email">

                            </div>
                            @error('email')
                                    <div class="ms-3 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 align-items-center mt-3">
                            <div class="d-flex align-items-center mt-3">
                                <i class="fa-solid fa-circle-xmark"></i><input type="text" name="problem" value="{{old('problem')}}" class="form-control" id="exampleFormControlInput1" placeholder="Vấn đề">

                            </div>
                            @error('problem')
                                    <div class="ms-3 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 align-items-center mt-3">
                            <div class="d-flex align-items-center mt-3">
                                <i class="fa-solid fa-audio-description"></i><input type="text" name="description" value="{{old('description')}}" class="form-control" id="exampleFormControlInput1" placeholder="Mô tả vấn đề">

                            </div>
                            @error('description')
                                    <div class="ms-3 text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex ms-3 " style="justify-content: center">   
                            <input class="btn btn-pink" type="submit" value="Gửi yêu cầu">
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        document.getElementById("form").addEventListener("submit", function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Câu hỏi của bạn?",
                text: "Câu hỏi này đã đến nhà quản trị, mong rằng sự phản hồi sớm sẽ giúp ích gì đó cho bạn",
                icon: "question"
            });
        });
    </script> --}}
@endsection