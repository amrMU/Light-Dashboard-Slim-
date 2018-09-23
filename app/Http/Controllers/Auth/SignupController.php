<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
class SignupController extends Controller
{
    public function GetSignup()
    {
        $countries = Country::all();
    	return view('auth.front.signup',compact('countries'));
    }
}
