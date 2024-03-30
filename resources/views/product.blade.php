@extends('head')

@section('content')
    <h4 class="text-grey fw-light mt-8 text-center">--- Danh Sách Sản Phẩm --- </h4>
    <div class="container" id="loadProduct">        
        @include('products.list')        
    </div>
    <div class="container">
        <div class="button_load_more btn " id="button-loadMore">
            <input type="hidden" value="1" id="page">
            <a  class="btn btn-pink" onclick="loadMore()">Load More</a>
        </div>
    </div>
    
@endsection