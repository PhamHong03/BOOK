@extends('admin.main')


@section('content')
        
    <form action="" method="POST">
       @csrf
        <div class="card-body">
            <div class="row ">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tiêu đề </label>
                        <input type="text " value="{{ $slider->name }}" name="name" class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Đường dẫn </label>
                        <input type="text " value="{{ $slider->url }}" name="url" class="form-control" >
                    </div>
                </div>
                
            </div>
                         
            
            <div class="form-group">
                <label for="">Ảnh sản phẩm </label>
                <input type="file" class="form-control" id="upload"> 
                <div id="image_show">
                    <a href="{{ $slider->thumnb }}">
                        <img src="{{ $slider->thumnb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumnb" value="{{ $slider->thumnb }}" id="thumnb">
            </div>

            <div class="form-group">
                <label for="menu">Sắp xếp</label>
                <input type="number" value="1"name="sort_by" value="{{ $slider->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" name="active" 
                    {{ $slider->active  == 1 ? 'checked' : ''}}>
                    <label for="active" class="custom-control-label">Có </label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" name="active" id="noactive"
                    {{ $slider->active  == 0 ? 'checked' : ''}}>
                    <label for="noactive" class="custom-control-label">Không có  </label>
                </div>
            </div>
        </div>   
      
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật slider</button>
        </div>
        
    </form>
@endsection
