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
                <input type="text " name="name" value="{{ $menu->name }}" class="form-control" placeholder="Tên danh mục ">
            </div>
            <div class="form-group">
                
                <select name="parent_id" class="form-control">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected':'' }}>Danh mục cha</option>
                    @foreach ($menus as $menuParent )
                        <option value="{{$menuParent->id }}" 
                            {{ $menu->parent_id == $menuParent->id ? 'selected':'' }}>
                            {{ $menuParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label>Mô tả </label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>   
            
            <div class="form-group">
                <label >Mô tả chi tiết </label>
                <textarea name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
            </div>   
            
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="1" name="active" 
                    {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có </label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="0" name="active" id="noactive"
                    {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label for="noactive" class="custom-control-label">Không có  </label>
                </div>
            </div>
        </div>   
      
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        
    </form>
@endsection

@section('foot')
<script> 
    
    CKEDITOR.replace( 'content' );
</script>
@endsection