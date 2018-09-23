<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminsRequest;
use App\User;
use Session;
class AdminsController extends Controller
{
	
  public function index()
  {
  	$admins = User::where('type_user','admin')->get();
    return view('admin.admins.index',compact('admins'));
  }	

   public function create()
  {
    return view('admin.admins.create');
  }

  public function store(AdminsRequest $request)
  {
  	$create_user  = User::create([
  						'name'=>strip_tags($request->get('name')),
              'email'=>strip_tags($request->get('email')),
              'phone'=>strip_tags($request->get('phone')),
  						'password'=>bcrypt($request->get('password')),
  						'type_user'=>'admin',
              'image'=>'img/1.png'
            ]);

  	 if ($request->hasFile('image')) {

			$time = time();

			$ext  = $request->file('image')->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;

			$request->file('image')->move(public_path() .'/uploads/images/admins/', $fullname);

			$path = public_path() .'/uploads/images/admins/';

			$this->attributes['image'] ='uploads/images/admins/'.$fullname;

	    	$create_user = User::find($create_user->id)->update([
	    		'image'=>$this->attributes['image']
	    	]);

		}

    Session::flash('success','تم اضافه لمسؤل بنجاح !');
    return redirect()->back();
  }

  public function show($id)
  {
    # code...
  }

  public function edit($id)
  {
    $admin = User::find($id);
    return view('admin.admins.edit',compact('admin'));

  }

  public function update($id,AdminsRequest $request)
  {
    
    $update_user  = User::find($id)->update([
              'name'=>strip_tags($request->get('name')),
              'email'=>strip_tags($request->get('email')),
              'phone'=>strip_tags($request->get('phone')),
              'password'=>bcrypt($request->get('password')),
              'type_user'=>'admin',
            ]);

     if ($request->hasFile('image')) {

      $time = time();

      $ext  = $request->file('image')->getClientOriginalExtension();

			$fullname = $time . '.' . $ext;

			$request->file('image')->move(public_path() .'/uploads/images/admins/', $fullname);

			$path = public_path() .'/uploads/images/admins/';

			$this->attributes['image'] ='uploads/images/admins/'.$fullname;

	    	$create_user = User::find($id)->update([
	    		'image'=>$this->attributes['image']
	    	]);

		}

    Session::flash('success','تم تعديل بيانات المسؤل !');
    return redirect()->back();
  }


  public function destroy($id)
  {
  	User::destroy($id);
    Session::flash('success','تمت عملية الحذف بنجاح .. ');
    return redirect()->back();
  }
}
