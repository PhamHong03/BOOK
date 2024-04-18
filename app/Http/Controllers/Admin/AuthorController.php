<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\Users\UserService;

class AuthorController extends Controller
{
    protected $user ;
    public function __construct(UserService $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.accounts.edit', [
            'title' => 'Chỉnh sửa tài khoản',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $result = $this->user->update($request, $user);
        
        if($result) {
            return redirect('/admin/account');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function account(){
        $user = User::orderByDesc('id')->paginate(8);
        return view('admin.accounts.account', [
            'title' => 'Danh sách tài khoản người dùng',
            'user' => $user
        ]);
    }

}
