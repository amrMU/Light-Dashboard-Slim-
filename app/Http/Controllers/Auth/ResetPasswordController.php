<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ForgetPasswordRequest;
use App\Http\Requests\Admin\PasswordResetRequest;
use App\User;
use Session;
use Mail;

class ResetPasswordController extends Controller
{
    public function GetForgetPassword()
    {
    	return view('auth.forget_password');
    }

    public function PostForgetPassword(ForgetPasswordRequest $request)
    {
    	 $find_user = User::where('email',$request->get('email'))->get();
    	 if(count($find_user) > 0){
    	 $find_user = User::where('email',$request->get('email'))->first();
            $generate_code = substr(md5(rand()),0,10);
            $token = md5(rand());

             $update_user = User::find($find_user->id)->update([
                'reset_code'=>$generate_code,
                'user_token'=>$token
            ]);

            Mail::send('email.reset_code', ['username'=>$find_user->name,'generate_code'=>$generate_code,'email'=>$find_user->email,'find_user'=>$find_user], function ($message) use ($find_user,$generate_code)
             {
             	$message->from('no-reply@Vidhunting.com', 'Support.Vidhunting.com');
             	$message->to($find_user->email)->subject('Forget password');
             });

             Session::flash('success','Thanks, please Check Your Email ');
             return redirect('reset/verfy/'.$token);
        }else{
        	  Session::flash('error','ops, Email Not valid ');
             return redirect()->back();
        }
    }

    public function GetCodeVerfy($token)
    {
    	return view('auth.code_verfy',compact('token'));
    }

    public function PostCodeVerfy($token,Request $request)
    {
    	if ($request->has('code')) {
			 $find_user = User::where('reset_code',$request->get('code'))->get();
			 if(count($find_user) > 0){
			 	$find_user = User::where('reset_code',$request->get('code'))->first();

			 	Session::flash('success','Thanks, Now You Can reset Your Password, congrats!');
			 	return redirect('reset/password/'.$token);
			 }else{
			 	Session::flash('error','Ops, Code Not Valid');
			 	return redirect()->back();
			 }
    	}else{
    		Session::flash('error','Code verify required');
    		return redirect()->back();
    	}
    }

    public function GetRestorePassword($token)
    {
    	return view('auth.restore_password',compact('token'));
    }

    public function PostRestorePassword($token,PasswordResetRequest $request)
    {
    	$find_user = User::where('user_token',$token)->get();

		 if(count($find_user) > 0){
		 	
		 	$find_user = User::where('user_token',$token)->first();

		 	$updae_password = User::where('user_token',$token)->update([
		 		'password'=>bcrypt($request->get('password')),
		 	]);
		 	Session::flash('success','Congrats, Now You Can Use New Password To Sign-In');
    		return redirect('/');
		 }else{
		 	Session::flash('error','something wrong, try again later!');
    		return redirect()->back();
		 }
    }
}
