@extends('admin.main')


@section('content')
    {{-- @php
        $count = 0;
        $countGiao = 0;
        $day = '';
    @endphp
    @foreach ($customers as $customer)
        
        @foreach ($carts as $cart )
            @if ($customer->updated_at)
                @php
                    $day = $customer->updated_at;
                @endphp
                @if($customer->status == 3)
                    @if($customer->id === $cart->customer_id)
                        @php
                            $count++;
                            $countGiao+= $cart->qty * $cart->price;
                        @endphp
                    @endif
                @endif    
            @endif        
        @endforeach
    @endforeach

    <div class="thongke_tong">
        <div class="container">
            <h2 class="title">Khối Thống Kê Doanh Thu</h2>
        </div>
    
        <div class="thongke">
            <div class="container">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    Ngày {{ $day }}
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    Tổng số đơn giao {{ $count/2 }}
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    Tổng doanh thu {{ $countGiao }}
                </div>
            </div>
        </div>
    </div> --}}

    @php
        $count = 0;
        $countGiao = 0;
        $day = '';
        $monthRevenue = [];

        foreach ($customers as $customer) {
            foreach ($carts as $cart) {
                if ($customer->updated_at) {
                    $day = $customer->updated_at;

                    if ($customer->status == 3) {
                        if ($customer->id === $cart->customer_id) {
                            $month = date('m', strtotime($day));
                            if (!isset($monthRevenue[$month])) {
                                $monthRevenue[$month] = 0;
                            }
                            $monthRevenue[$month] += $cart->qty * $cart->price;
                            $count++;
                            $countGiao++;
                        }
                    }
                }
            }
        }
        // foreach ($monthRevenue as $month => $revenue) {
        //     echo "Doanh thu tháng $month: $revenue" . PHP_EOL;
        // }
    @endphp

    <div class="container">
        <div class="container">
            <h2 class="title"> Khối Thống Kê Doanh Thu Theo Tháng</h2>
        </div>

        <div class="mb-3 mt-3">
            @foreach ($monthRevenue as $month => $revenue)
            <div class="doanhthu">
                <div class="chung month">
                    Tháng  {{ $month }}
                </div>
                <div class="chung revenue">
                    {{ number_format($revenue) }}đ
                </div>
            </div>      
        @endforeach
        </div>
    </div>
@endsection
