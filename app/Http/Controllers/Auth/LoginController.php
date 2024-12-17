<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function ShowLogin(){

        return view('login');
    }
    public function Login(Request $request){
        $credentials = [
            'email' => $request -> email,
            'password' => $request->password,
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('admin.home');
        }
        return redirect()->back()->withErrors(['login_error' => 'Fail to sign in']);
    }
}
