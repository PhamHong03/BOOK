<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;
    class MenuService {

        public function getParent() {
            return Menu::where('parent_id', 0)->get();
        }

        public function show() {
            return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->orderByDesc('id')
            ->get();
        }

        public function getAll() {
            return Menu::orderbyDesc('id')->paginate(20);
        }
        public function create($request){
            try {                
                Menu::create([
                    'name' => (string)$request->input('name'),
                    'parent_id' => (string)$request->input('parent_id'),
                    'description' => (string)$request->input('description'),
                    'content' => (string)$request->input('content'),
                    'active' => (string)$request->input('active'),
                    'slug' => Str::slug($request->input('name'), '-')
                ]);
                Session::flash('success', 'Tạo danh mục thành công');
            }catch(\Exception $err) {
                Session::flash('error', $err->getMessage());
                return false;
            }
            return true;
        } 


        public function destroy($request) {
            $id = (int) $request->input('id');
            $menu = Menu::where('id', $id)->first();

            if($menu){
                return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
            }
            return false; 
        }

        public function update($request, $menu) {
            if($request->input('parent_id') != $menu->id) {
                $menu->parent_id = (int) $request->input('parent_id');
            }
            $menu->name = (string) $request->input('name');
            $menu->description = (string) $request->input('description');
            $menu->content = (string) $request->input('content');
            $menu->active = (string) $request->input('active');
            
            // $menu->fill($request->input());
            $menu->save();

            Session::flash('success', 'Cập nhật thành công danh mục ');

            return true;

        }

        public function getId($id) {
            return Menu::where('id', $id)->where('active',1)->firstOrFail();
        }

        public function  getProduct($menu)  {
             
            return $menu->products()
            ->select('id','name', 'price','price_sale', 'thumnb')
            ->where('active', 1)
            ->orderByDesc('id')
            ->paginate(12);
        }

       
    }
?>