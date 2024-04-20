<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

class AdminCartController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    public function index() {
        return view('admin.cart.customer', [
            'title' => 'Danh Sách Đơn Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }
    
    
    public function show(Customer $customer) {
        
       $carts = $this->cart->getProductForCart($customer);
  
        return view('admin.cart.detail', [
            'title' => 'Chi Tiết Đơn Hàng : ' .$customer->name,
            'customers' => $customer,
            'carts' => $carts          
        ]);
    }
    
    public function editCart(Customer $customer){

        $carts = $this->cart->getProductForCart($customer);
        // dd($customers);
        return view('admin.cart.edit', [
            'title' => 'Cập Nhật Trạng Thái',
            'customers' => $customer,
            'carts' => $carts
        ]);
    }


    public function update(Request $request, Customer $customer){
        $result = $this->cart->update2($request, $customer);
        // dd($result);
        if($result) {
            return redirect('/admin/customers');
        }
        return redirect()->back();
    }

    public function approve(){
        // $carts = $this->cart->getProductForCart($customer);
        // dd($customers);
        return view('admin.cart.approve', [
            'title' => 'Danh Sách Đơn Đã Phê Duyệt',
            'customers' => $this->cart->getCustomer()
        ]);
    }
    public function wait(){
        // $carts = $this->cart->getProductForCart($customer);
        // dd($customers);
        return view('admin.cart.wait', [
            'title' => 'Danh Sách Đơn Chờ Phê Duyệt',
            'customers' => $this->cart->getCustomer()
        ]);
    }
    public function cancel(){
        // $carts = $this->cart->getProductForCart($customer);
        // dd($customers);
        return view('admin.cart.cancel', [
            'title' => 'Danh Sách Đơn Không Đủ Điều Kiện',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function doanhThu(Request $request){
        $startDate = $request->input('created_at');
        $endDate = $request->input('updated_at');

        $products = Product::with('carts')->get();

        $productRevenues = [];

        foreach ($products as $product) {
            $productRevenue = 0;

            foreach ($product->orders as $order) {
                foreach ($order->orderItems as $orderItem) {
                    if ($orderItem->product_id === $product->id) {
                        $productRevenue += $orderItem->quantity * $orderItem->price;
                    }
                }
            }
            $productRevenues[$product->id] = $productRevenue;
        }
        return $productRevenue;
    }
    
}
