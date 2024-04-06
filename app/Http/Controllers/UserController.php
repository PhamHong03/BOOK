<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginForm;
use Illuminate\Http\Request;
use App\Http\Requests\Register\RegisterForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function postRegister(RegisterForm $request) {
        
        $request->merge(['password' => Hash::make($request->password)]);
        try{
            User::create($request->all());
        }catch(\Throwable $th){

        }
        return redirect()->route('login');
    }   

    public function postLogin(LoginForm $request)  {
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('bookstore');
        }
        return redirect()->back()->with('error', 'Thất bại! Vui lòng kiểm tra lại email hoặc password');
    }

    public function logout() {
        Auth::logout();
        return redirect()->back();
    }
    public function store(RegisterForm $request) {
        return back()->with('message', 'Form submitted successfully ');
    }
}
