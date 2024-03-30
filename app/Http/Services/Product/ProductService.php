<?php
namespace App\Http\Services\Product;

use App\Models\Product;

class ProductService 
{
    const LIMIT = 18;

    public function get($page = null) {

        return Product::select('id', 'name', 'price', 'price_sale', 'thumnb')
        ->orderByDesc('id')
        ->when($page != null, function($query) use ($page){
            $query->offset($page * self::LIMIT);
        })
        ->limit(self::LIMIT)
        ->get();
    }

    public function show($id) {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }



    public function more($id) {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumnb')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }




    public function search($request) {
        return Product::where('name', 'like', '%'.$request->key. '%')
            ->orwhere('price_sale', $request->key)
            ->orwhere('price', $request->key)
            ->get();            
    }
}


