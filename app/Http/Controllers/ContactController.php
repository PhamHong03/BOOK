<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Contact\ContactFormRequest;

class ContactController extends Controller
{
    public function contact(){
        return view('contact', [
            'title' => 'LIÊN HỆ '
        ]);
    } 

    public function store(ContactFormRequest $request) {
        return back()->with('message', 'Form submitted successfully ');
    }
}
