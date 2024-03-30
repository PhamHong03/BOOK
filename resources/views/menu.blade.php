@extends('head')

@section('content')
    <h4 class="text-grey fw-light mt-2 text-center">{{ $title }} </h4>
    <div class="container" id="loadProduct">        
        @include('products.list')        
    </div>
    
    {!! $products->links() !!}
    
@endsection