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
    
    public function approve(Request $request){

        return view('admin.cart.approve', [
            'title' => 'Đơn đã duyệt',
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
