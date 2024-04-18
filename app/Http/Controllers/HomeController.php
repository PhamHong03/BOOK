<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function profile()
    {
        // $user = User::select('name', 'email', 'role');
        
        return view('users.profile',[
            'title' => 'Trang Cá Nhân',
            // 'user' => $user
        ]);
    }
}
