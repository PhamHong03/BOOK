@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
        
    <form action="" method="POST">
       @csrf
        <div class="card-body">
            <div class="row ">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm  </label>
                        <input type="text " value="{{ old('name') }}" name="name" class="form-control" placeholder="Nhập tên sản phẩm  ">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Danh mục </label>
                        <select name="menu_id" class="form-control">        
                            @foreach ($menus as $menu )
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc </label>
                        <input type="number " value="{{ old('price') }}" name="price" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu"> Phần trăm</label>
                        <input type="number" value="{{ old('price_sale') }} "name="price_sale" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tác Giả </label>
                        <input type="text" value="{{ old('author') }}" name="author" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Nhà Xuất Bản</label>
                        <input type="text" value="{{ old('publisher') }} "name="publisher" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label>Mô tả </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>   
            
            <div class="form-group">
                <label >Mô tả chi tiết </label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>   
            
            <div class="form-group">
                <label for="">Ảnh sản phẩm </label>
                <input type="file" class="form-control" id="upload"> 
                <div id="image_show">

                </div>
                <input type="hidden" name="thumnb" id="thumnb">
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" name="active" checked="">
                    <label for="active" class="custom-control-label">Có </label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" name="active" id="noactive">
                    <label for="noactive" class="custom-control-label">Không có  </label>
                </div>
            </div>
        </div>   
      
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm mới</button>
        </div>
        
    </form>
@endsection

@section('foot')
<script> 
    
    CKEDITOR.replace( 'content' );
</script>
@endsection