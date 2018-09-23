<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Country;
use Session;

class CountriesController extends Controller
{
    public function index()
    {
      $countries = Country::all();
      return view('admin.countries.index',compact('countries'));
    }

    public function show($id)
    {
        # code...
    } 
    public function create()
    {
      return view('admin.countries.create');
    }

    public function store(CountryRequest $request)
    {
    	
		$create_country = Country::create($request->all());
    	Session::flash('success','تم تحديث البيانات بنجاح!');
	    return redirect()->back();
    }

    public function edit($id)
    {
      $country = Country::find($id);
      return view('admin.countries.edit',compact('country'));
    }

    public function update(CountryRequest $request,$id)
    {
        $update_country = Country::find($id)->update($request->all());
        Session::flash('success','تم تحديث البيانات بنجاح!');
        return redirect()->back();
    }

    public function destroy($id)
    {   
        Country::destroy($id);
        Session::flash('success','تم  حذف البيانات  بنجاح');
        return redirect()->back();   
    }
}
