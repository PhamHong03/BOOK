<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginForm;
use Illuminate\Http\Request;
use App\Http\Requests\Register\RegisterForm;

class UserController extends Controller
{
    public function register(){
        return view('register', [
            'title' => 'ĐĂNG KÝ'
        ]);
    } 

    
    public function postRegister(RegisterForm $request) {
        dd($request->all());
    }







    public function login(){
        return view('login', [
            'title' => 'ĐĂNG NHẬP'
        ]);
    } 

    public function postLogin(LoginForm $request)  {
        dd($request->all());
    }
    public function store(RegisterForm $request) {
        return back()->with('message', 'Form submitted successfully ');
    }
}
