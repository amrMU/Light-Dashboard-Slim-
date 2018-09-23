<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaqRequest;
use App\Faq;
use Session;
class FaqController extends Controller
{
     public function index()
    {
      $faq = Faq::all();
      return view('admin.faq.index',compact('faq'));
    }

    public function show($id)
    {
        # code...
    } 
    public function create()
    {
      return view('admin.faq.create');
    }

    public function store(FaqRequest $request)
    {
    	
		$create_faq = Faq::create($request->all());
    	Session::flash('success','تم تحديث البيانات بنجاح!');
	    return redirect()->back();
    }

    public function edit($id)
    {
      $faq = Faq::find($id);
      return view('admin.faq.edit',compact('faq'));
    }

    public function update(FaqRequest $request,$id)
    {
        $update_faq = Faq::find($id)->update($request->all());
        Session::flash('success','تم تحديث البيانات بنجاح!');
        return redirect()->back();
    }

    public function destroy($id)
    {   
        Faq::destroy($id);
        Session::flash('success','تم  حذف البيانات  بنجاح');
        return redirect()->back();   
    }
}
