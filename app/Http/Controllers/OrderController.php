<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Customer;


class OrderController extends Controller
{
    protected $CartService;
    public function __construct(CartService $cartService)
    {
        $this->CartService = $cartService;
    }

    public function order(Customer $customer, Request $request = null) // Optional Request parameter
    {
        $carts = $this->CartService->getProductForCart($customer);
        // ... (rest of your logic for processing the order)

        return view('carts.order', [
            'title' => 'Chi Tiết Đơn Hàng',
            'customers' => $customer,
            'carts' => $carts
        ]);
    }
}
