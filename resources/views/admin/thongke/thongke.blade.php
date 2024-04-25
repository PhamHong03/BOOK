@extends('admin.main')


@section('content')
    @php
        $count = 0;
        $countDuyet = 0;
        $countHuy = 0;
        $countCho = 0;
        $countGiao = 0;
        $price_doanhthu = 0;
    @endphp
    <div class="thongke_tong">
        <div class="container">
            <h2 class="title"> Khối thống kê số lượng đơn hàng</h2>
        </div>
    
        <div class="thongke">
            
            @foreach ($customers as $customer)
                @php
                    $count++;
    
                @endphp
                @if ($customer->status == 1)
                    @php
                        $countDuyet++;
                        
                    @endphp
                @elseif ($customer->status == 0)
                    @php
                        $countCho++;
                    @endphp
                @elseif ($customer->status == 2)
                    @php
                        $countHuy++;
                    @endphp
                @elseif ($customer->status == 3)
                    @php
                        $countGiao++;
                    @endphp
                @endif
            @endforeach
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title">
                            Tổng số đơn
                        </h2>
                        <div class="count count_tong">
                            {{ $count }} đơn
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: purple">
                            Đơn đã giao
                        </h2>
                        <div class="count count_giao">
                            {{ $countGiao }} đơn 
                        </div>
                    </div> 
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: green">
                            Đơn đã duyệt
                        </h2>
                        <div class="count count_duyet">
                            {{ $countDuyet }} đơn 
                        </div>
                    </div> 
                    
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: blue">
                            Đơn đang chờ
                        </h2>
                        <div class="count count_cho">
                            {{ $countCho }} đơn
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <h2 class="thongke__title" style="color: orangered">
                            Đơn từ chối
                        </h2>
                        <div class="count count_huy">
                            {{ $countHuy }} đơn 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
