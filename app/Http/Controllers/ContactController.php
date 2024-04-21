<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Contact\ContactFormRequest;
use App\Models\Contact;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session ;

class ContactController extends Controller
{
    public function contact(){
        return view('contact', [
            'title' => 'LIÊN HỆ '
        ]);
    } 

    public function store(ContactFormRequest $request) {
        // dd($request->all());
        try {                
            Contact::create([
                'name' => (string)$request->input('name'),
                'email' => (string)$request->input('email'),
                'problem' => (string)$request->input('problem'),
                'description' => (string)$request->input('description')
            ]);
            Session::flash('success', 'Gửi yêu cầu thành công');
        }catch(\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        // return true;
        return back()->with('message', 'Form submitted successfully ');
    }
}
