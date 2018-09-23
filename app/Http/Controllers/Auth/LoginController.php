<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;
use Session;
use LaravelLocalization;
class LoginController extends Controller
{
    public function GetLogin()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $email = $request->get('email');
        $password =$request->get('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
           if(Auth::user()->type_user == "admin"){
            LaravelLocalization::setLocale() == 'ar';
            return redirect()->intended('/admin/home');
           }else{
            return redirect()->intended(LaravelLocalization::getCurrentLocale().'/');               
           }
        }else{
            Session::flash('error','please check your email and password');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
