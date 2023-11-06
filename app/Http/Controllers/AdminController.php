<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller

{
  use AuthenticatesUsers;

  public function Admin_register (){
    return view('admin.register.admin_register_index');
  }
}
