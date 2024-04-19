<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Http\Controllers\CartController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class OrderController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }  
    
  
    public function order(Customer $customer){
        $carts = $this->cart->getProductForCart($customer);
         return view('carts.order', [
            'title' => 'Chi Tiết Đơn Hàng ',
            'customers' => $customer,
            'carts' => $carts          
        ]);
    }
    
}
