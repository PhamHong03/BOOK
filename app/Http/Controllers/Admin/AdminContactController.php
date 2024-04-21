<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(){
        
        $contacts = Contact::orderByDesc('id')->paginate();
        // dd($contacts);
        return view('admin.contact',[
            'title' => 'Liên Hệ Của Khách Hàng',
            'contacts' => $contacts
        ]);
    }
}
