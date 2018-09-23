<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserSettingsRequest;
use App\User;
use Session;

class UsersGroupSettingsController extends Controller
{
    public function suspended($user_id,UserSettingsRequest $request)
    {
    	$user_susbend = User::find($user_id)->update([
    		'status'=>'suspended',
    		'deactive_reason'=>'',
    		'suspended_reason'=>$request->message
    	]);
    	Session::flash('success','User Susbend successfly!');
    	return redirect()->back();
    }

     public function deactivate($user_id,UserSettingsRequest $request)
    {
    	$user_susbend = User::find($user_id)->update([
    		'status'=>'deactive',
    		'suspended_reason'=>'',
    		'deactive_reason'=>$request->message
    	]);
    	Session::flash('success','User Deactivate successfly!');
    	return redirect()->back();
    } 

    public function active($user_id)
    {
    	$user_unsusbend = User::find($user_id)->update([
    		'status'=>'active',
    		'suspended_reason'=>'',
            'deactive_reason'=>''

    	]);
    	Session::flash('success','User active successfly!');
    	return redirect()->back();
    }
}
