<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('register', [
            'title' => 'ĐĂNG KÝ'
        ]);
    } 
    public function login(){
        return view('login', [
            'title' => 'ĐĂNG NHẬP'
        ]);
    } 
}
