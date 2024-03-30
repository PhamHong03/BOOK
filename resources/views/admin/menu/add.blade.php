@extends('admin.main')

@section('head')
<script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
        
    <form action="" method="POST">
       @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục </label>
                <input type="text " name="name" class="form-control" placeholder="Tên danh mục ">
            </div>
            <div class="form-group">

                <select name="parent_id" class="form-control">
                    <option value="0">Danh mục cha </option>
                    @foreach ($menus as $menu )
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Mô tả </label>
                <textarea name="description" class="form-control"></textarea>
            </div>   
            
            <div class="form-group">
                <label >Mô tả chi tiết </label>
                <textarea name="content" id="content" class="form-control"></textarea>
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
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        
    </form>
@endsection

@section('foot')
<script> 
    
    CKEDITOR.replace( 'content' );
</script>
@endsection