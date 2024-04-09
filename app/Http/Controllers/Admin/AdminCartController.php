<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;

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
        // dd($customer->carts()->get()  );
        return view('admin.cart.detail', [
            'title' => 'Chi Tiết Đơn Hàng : ' .$customer->name,
            'customers' => $customer,
            'carts' => $customer->carts()->with('product')->get()           
        ]);
    }

}
