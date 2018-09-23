<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AboutUs;
use App\Http\Requests\Admin\AboutUsRequest;
use Session;

class AboutUsController extends Controller
{
    public function index($value='')
    {
        # code...
    }
    public function create()
    {
	  $info = AboutUs::first();
      return view('admin.about_us.create',compact('info'));
    }

    public function store(AboutUsRequest $request)
    {
    	$check_info = AboutUs::count();
    	if ($check_info > 0 ) {
    		$get_info = AboutUs::first();
    		$update_info = AboutUs::find($get_info->id)->update($request->all());
    	}else{
    		$create_info = AboutUs::create($request->all());
    	}
    	Session::flash('success','تم تحديث البيانات بنجاح!');
	    return redirect()->back();
    }
}
