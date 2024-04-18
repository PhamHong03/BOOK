

    <div class="row mt-4" >
        @foreach ($products as $key => $product )
            
            <div class="col-lg-2 col-sm-6 col-md-4 col-12 mb-2 text-center product id">
                <a href="{{ URL::to('/san-pham/'.$product->id.'-'.$product->menu->slug.'.html') }}">
                
                <div class="product-item">
                    <div class="product-img" >
                        <img src="{{ $product->thumnb }}" alt="{{ $product->name }}" class="image" >
                        <span class="product-img-sale">{{ $product->price_sale }}%</span>
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
                    <h6 >{{ $product->name }}</h6>
                    <div class="price">
                        <span class="price price_price">
                            {!! \App\Helper\Helper::price_price($product->price) !!}đ
                        </span>
                        <span class="price price_sale">
                            {!! \App\Helper\Helper::price_sal($product->price,$product->price_sale) !!}đ
                        </span>
                        
                    </div>
                </div>
            </a>
            </div>           
        @endforeach
           
    </div>  
    
