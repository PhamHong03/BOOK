@extends('admin.main')


@section('content')
<form method="POST" action="" id="form" class="form">
    {{-- <h4  class="approve"><strong>Trạng thái:</strong> 
        <select name="status" id="" class="p-1" >
            <option style="color: blue" value="0" {{ $customers->status == 0 ? 'selected' : '' }}>Chờ phê duyệt</option>
            <option style="color: green" value="1" {{ $customers->status == 1 ? 'selected' : '' }}>Đã phê duyệt</option>
        </select>  
    </h4> --}}
    <div class="customer mt-2">
        
        <ul>
            <li>Tên khách hàng : <strong>{{ $customers->name }}</strong></li>
            <li>Số điện thoại : <strong>{{ $customers->phone }}</strong></li>
            <li>Địa chỉ : <strong>{{ $customers->address }}</strong></li>
            <li>Email : <strong>{{ $customers->email }}</strong></li>
            <li>Ghi chú : <strong>{{ $customers->content }}</strong></li>
            <li>Trạng thái :
                {{-- @if ($customers->status == 1)
                    <strong>Đã phê duyệt</strong>
                @elseif ($customers->status == 0)
                <strong>Chờ phê duyệt</strong>
                @endif --}}
                <select name="status" id="" class="p-1" >
                    <option style="color: blue" value="0" {{ $customers->status == 0 ? 'selected' : '' }}>Chờ phê duyệt</option>
                    <option style="color: green" value="1" {{ $customers->status == 1 ? 'selected' : '' }}>Duyệt đơn</option>
                    <option style="color: orangered" value="2" {{ $customers->status == 1 ? 'selected' : '' }}>Không đủ điều kiện</option>
                </select> 
            </li>
        </ul>
    </div>
    @php
        $total = 0;
        $total_ship = 0;
    @endphp 
    
    
    <div class="cart__admin">
        <div class="product__cart--admin ">
            <table class="table cart__admin-table">
                <tbody>
                  <tr >
                      <th class="column-1 table_admin">HÌNH ẢNH</th>
                      <th class="column-2 table_admin">TÊN SẢN PHẨM</th>
                      <th class="column-3 table_admin">GIÁ SẢN PHẨM</th>
                      <th class="column-4 table_admin">SL</th>
                      <th class="column-5 table_admin">TỔNG GIÁ</th>
                      {{-- <th class="column-5 table_admin">TỔNG GIÁ</th> --}}
                      {{-- <th class="column-1 table_admin">TRẠNG THÁI</th> --}}
                      {{-- <th class="column-1 table_admin">Active</th> --}}
                  </tr>              
                
                    @foreach ($carts as $key => $cart )         
                        @php                 
                            $price = floatval($cart->price) *  $cart->qty;
                            
                            $total += $price;
                            $ship = floatval(42000);

                            $total_ship = $total + $ship;                        
                        @endphp          
                        
                        <tr class="table_row ">
                            <td class="column-1 table_admin ">

                                <div class="how_itemcart1">
                                    <img src="{{ $cart->product->thumnb }}" alt="IMG" style="width: 70px">
                                </div>
                            </td>
                            <td class="column-2 table_admin">{{ $cart->product->name }}</td>
                            <td class="column-3 table_admin">{{ number_format($cart->price)}}đ</td>
                            <td class="column-4 table_admin">x{{ $cart->qty }}</td>
                            <td class="column-3 table_admin">{{ number_format($price) }}đ</td>  
                            {{-- <td class="column-1 table_admin" >
                                <select name="status" id="" class="p-1" >
                                    <option value="" class="disible">Trạng thái </option>
                                    <option value="0" {{ $cart->status == 0 ? 'selected' : '' }}>Chờ phê duyệt</option>
                                    <option value="1" {{ $cart->status == 1 ? 'selected' : '' }}>Đã phê duyệt</option>
                                </select>   --}}
                                {{-- @if ($cart->status == 0)
                                    <strong style="color: blue">                                
                                        Chờ phê duyệt
                                    </strong>
                                @elseif($cart->status == 1)
                                    <strong style="color: green">                                
                                        Đã phê duyệt
                                    </strong>
                                
                                @endif --}}
                            {{-- </td>                                 --}}
                            {{-- <td class="column-1 table_admin">
                                <a class="btn btn-primary btn-sm" href="/admin/customers/edit/{{ $cart->id }}" >
                                    <i class="fa-solid fa-pen-to-square"></i>                            
                                </a>
                            </td> --}}
                            
                            
                        </tr>                                    
                    @endforeach
                    <tr style="font-size: 1.4rem">
                        <td colspan="4" class="text-red text-right"><strong>Tổng thanh toán:</strong> </td>
                        <td style="width:100px"><strong>{{ number_format($total) }}đ</strong></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <button class=" btn btn-success " type="submit" id="btn-delivery" style="float: right">Xác nhận phê duyệt</button>        
    </div>
    @csrf
</form>
@endsection              
           
{{-- <script>
    function duyetdon(event) {
        console.log("Helllo peter");
        event.preventDefault()
        const form = document.querySelector('.form');
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Bạn muốn giao hàng đơn này không?",
            text: "Khách hàng có lẽ đang cần bạn!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: " Xác nhận!", 
            cancelButtonText: "Không! ",
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.setAttribute('action','/admin/customers');
                    form.submit();
                    swalWithBootstrapButtons.fire({
                    title: "Xác nhận thành công!",
                    text: "Đơn hàng sẽ được giao!",
                    icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                    title: "Không thành công",
                    text: "Đơn hàng bất động",
                    icon: "error"
                    });
                }
            });
        };

</script> --}}