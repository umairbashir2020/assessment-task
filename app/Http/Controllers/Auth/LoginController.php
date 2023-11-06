<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        $usercradential = $request->only('email','password');
        if (Auth::attempt($usercradential)) {
            $user = User::with('roles')->find(auth()->user()->id);
            if($user->roles[0]->name == 'admin'){
                $users = \App\Models\User::whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'admin');
                })->get();
                return view('admin.user.index',compact('users'));
            }else{
                return redirect()->route('feedback');
            }

        }
        return back()->withInput($request->only('email', 'remember'));

    }
}

  



