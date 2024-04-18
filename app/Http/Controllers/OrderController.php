<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }  
    
  
    public function order(Customer $customer){
        
    }
    
}
