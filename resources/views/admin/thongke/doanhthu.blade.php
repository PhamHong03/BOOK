@extends('admin.main')


@section('content')
    {{-- <div class="thongke_tong">
        <div class="container">
            <h2 class="title"> Doanh thu đơn hàng</h2>
        </div>
    
        <div class="thongke">
            @php
                $count = 0;
                $countDuyet = 0;
            @endphp
            @foreach ($customers as $customer)
                @php
                    
                @endphp
                @if ($customer->status == 1)
                    @php
                        $countDuyet++;
                    @endphp
                
                @endif
            @endforeach
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title">
                            Tổng số đơn
                        </h2>
                        <div class="count count_tong">
                            {{ $count }} đơn
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: green">
                            Đơn đã duyệt
                        </h2>
                        <div class="count count_duyet">
                            {{ $countDuyet }} đơn 
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: orangered">
                            Đơn đã hủy
                        </h2>
                        <div class="count count_huy">
                            {{ $countHuy }} đơn 
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: blue">
                            Đơn đang chờ
                        </h2>
                        <div class="count count_cho">
                            {{ $countCho }} đơn
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @foreach ($carts as $cart)
        <h1>{{ $cart->price }}</h1>
    @endforeach
@endsection
