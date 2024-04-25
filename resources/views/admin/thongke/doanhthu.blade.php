@extends('admin.main')


@section('content')

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
        
    @endphp

    <div class="container thongke_tong_quat">
        <div class="container">
            <h2 class="title"> Khối Thống Kê Doanh Thu Theo Tháng</h2>
        </div>

        <div class="select__month__year">
            
            <div class="select__month">
                <select name="year" id="" class="select__month--select">
                    @for ($i = 1; $i <= 12 ; $i++)
                        <option value="$i">Tháng {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="select__year">
                <select name="year" id="">
                    @for ($i = 2024; $i >= 2012 ; $i--)
                        <option value="$i">Năm {{ $i }}</option>
                    @endfor
                </select>
            </div>
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
