<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Cities,App\Country;
use Session;

class CitiesController extends Controller
{
    public function index()
    {
      $cities = Cities::all();
      return view('admin.cities.index',compact('cities'));
    }

    public function show($id)
    {
        
    } 
    
    public function create()
    {
      $countries = Country::all();
      return view('admin.cities.create',compact('countries'));
    }

    public function store(CityRequest $request)
    {
    	
		$create_City = Cities::create($request->all());
    	Session::flash('success','تم تحديث البيانات بنجاح!');
	    return redirect()->back();
    }

    public function edit($id)
    {
      $countries = Country::all();
      $city = Cities::find($id);
      return view('admin.cities.edit',compact('city','countries'));
    }

    public function update(CityRequest $request,$id)
    {
        $update_City = Cities::find($id)->update($request->all());
        Session::flash('success','تم تحديث البيانات بنجاح!');
        return redirect()->back();
    }

    public function destroy($id)
    {   
        Cities::destroy($id);
        Session::flash('success','تم  حذف البيانات  بنجاح');
        return redirect()->back();   
    }
}
