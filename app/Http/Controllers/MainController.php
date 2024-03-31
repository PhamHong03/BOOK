<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }


    public function index() {
        return view('home', [
            'title' => 'BOOKSTORE',
            'slider' => $this->slider->show(),
            'menus' => $this->menu->show()
        ]);
    }

    public function loadProduct(Request $request) {

        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        
        if(count($result) != 0) {
            $html = view('products.list', ['products' => $result])->render();

            return response()->json([
                'html' => $html
            ]);
        }
        return response()->json([
            'html' => ''
        ]);
    }

   public function getSearch(Request $request) {
        return view('search', [
            'title' => 'Tìm kiếm sản phẩm',
            'products' => $this->product->search($request)
        ]);
   }

    public function products(){
        return view('product', [
            'title' => 'SẢN PHẨM',
            'products' => $this->product->get()
        ]);
    } 

   

    public function testEmail(){

        $name = 'Phạm Hồng';
        Mail::send('emails.test', compact('name'), function($email) use($name){
            $email->subject('Thư cảm ơn');
            $email->to('hongb2110012@student.ctu.edu.vn', $name);
        });
    }
}
