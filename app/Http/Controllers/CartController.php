<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use function Laravel\Prompts\alert;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;   
    }

    public function index(Request $request){

        $result = $this->cartService->create($request);

        if($result === false) {
            
            return redirect()->back(); 
        }
             
        sleep(1.5);
        // return redirect('/carts');
        return redirect('products');      
       
    }

    public function  show() {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'GIỎ HÀNG',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    

    public function update(Request $request) {       
        
        $this->cartService->update($request);
        // sleep(2);
        return redirect('/carts');
    }

    public function  remove($id  = 0) {
        $this->cartService->remove($id);

        return redirect('/carts');
    }
    
    public function  removeAll(Request $request) {
        $result = $this->cartService->removeAll($request);
        if($result === false){
            return redirect()->back();
        }
        sleep(1);            
        return redirect('/carts');
    }

    public function addCart(Request $request)  {

        $this->cartService->addCart($request);
        
        return redirect()->back();
    }

}
