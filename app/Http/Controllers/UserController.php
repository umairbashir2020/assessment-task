<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function index(){
        $users = User::whereDoesntHave('roles', function ($q) {
            $q->where('name', 'admin');
        })->get();
        return view('admin.user.index',compact('users'));
    }
    public function delete($id){
        User::find($id)->delete();
        return back();
    }
}
