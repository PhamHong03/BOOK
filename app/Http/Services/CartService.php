<?php
namespace App\Http\Services;

use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function App\Helper\Helper\price_sal;
class CartService 
{
    // protected $cart;

    // public function __construct(Cart $cart)
    // {
    //     $this->cart = $cart;
    // }

    
    public function  create($request) {
         $qty = (int)$request->input('num-product');

         $product_id = (int)$request->input('product_id');

        if($qty <= 0 || $product_id <= 0){
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');

            return false;
        } 
        // Session::forget('carts');
        $carts = Session::get('carts');        
      
        if(is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $product_id);

        if($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
          
            Session::put('carts', $carts);
            
            return true;
        }        
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);        
        return true;
    }

    public function  getProduct()  {
        $carts = Session::get('carts');

        if(is_null($carts)) {
            return [];
        }

        $product_id =  array_keys($carts);

        return Product::select('id', 'name', 'price', 'price_sale','thumnb')
            ->where('active', 1)
            ->whereIn('id', $product_id)
            ->get();
    }

    public function update($request){
        
        Session::put('carts', $request->input('num_product'));
        return true;
    }    
  

    public function  removeAll($request) {
        $carts = Session::get('carts');                
        unset($carts);
        Session::put('carts', $request->input('num-product'));
        return true;        
    }

    public function  removeCart() {
        $carts = Session::get('carts');                
        unset($carts);
        return true;
    }
    public function  remove($id) {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;        
    }


    public function addCart($request) {
        $address = $request->input('description') .', '.$request->input('ward')  . ', '. $request->input('district') . ', '.$request->input('city');            
        try{
            DB::beginTransaction();
            $carts = Session::get('carts');

            if(is_null($carts)) {
                return false;
            }                
            $customer = Customer::create([
                'name' => $request->input('name') ,
                'phone' => $request->input('phone'),
                'address' => $address,
                'email' => $request->input('email'),
                'content' => $request->input('content')
            ]);               
            
            $this->infoProductCart($carts, $customer->id); 

            // foreach($carts as $cart){
            //     OrderDetail::create([
            //         'cart_id' => $cart->id,
            //         'product_id' => $cart->product_id,
            //         'user_id' => Auth::user()->id,
            //         'qty' => $cart->qty,
            //         'price' => $cart->price
            //     ]);
            // }
            DB::commit();
            
            Session::flash('success', 'Đặt hàng thành công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSecond(2));
            
            Session::forget('carts');

        }catch(\Exception $err) {

            DB::rollBack();
            dd($err);
            Session::flash('error', 'Đặt hàng không thành công, vui lòng thử lại');   
                         
            return false;
        }
        return true;
    }
    
    protected function infoProductCart($carts, $customer_id) {

        $productId = array_keys($carts);

        $products = Product::select('id', 'name', 'price', 'price_sale','thumnb')
                ->where('active', 1)
                ->whereIn('id', $productId)
                ->get();     
    
        $data = [];
        foreach($products as  $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'qty' => $carts[$product->id],
                'price' => ($product->price - ( $product->price * ($product->price_sale / 100)))

            ];            
        }
                
        return Cart::insert($data);
    }   


    public function getCustomer() {
        return Customer::orderByDesc('id')->paginate(8);
    }

  
    
    public function getProductForCart($customer) {
        return $customer->carts()->with(['product' => function($query) {
            $query->select('id', 'name', 'thumnb');
        }])->get() ;
    }
    
}


