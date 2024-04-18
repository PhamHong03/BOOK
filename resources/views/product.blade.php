@extends('head')

@section('content')
    <h4 class="text-grey fw-light mt-8 text-center">--- Danh Sách Sản Phẩm --- </h4>
    <div class="container" id="loadProduct"> 
        <h4><i>Sản phẩm mới </i>
        </h4>

        @include('products.list')        
    </div>
    <div class="container">
        <div class="button_load_more" id="button-loadMore">
            <input type="hidden" value="1" id="page">
            <a  class="btn btn-success" onclick="loadMore()">Xem thêm</a>
        </div>
    </div>
    
@endsection