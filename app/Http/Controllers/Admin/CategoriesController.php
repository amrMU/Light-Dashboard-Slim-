<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id',NULL)->get();
        return view('admin.categories.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(ServiceRequest $request)
    {
    	$create = Category::create($request->all());
    
    	Session::flash('success','تم إضافة قسم  جديد');
    	return redirect()->back();
    }

    public function edit($id)
    {
        $info = Category::find($id);
        return view('admin.categories.edit',compact('info'));
    }

    public function update(ServiceRequest $request,$id)
    {
        $update = Category::find($id)->update($request->all());
    
        Session::flash('success','تم تعديل بيانات  القسم');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::destroy($id);
        Session::flash('success','تم حذف القسم بنجاح..');
        return redirect()->back();
    }
}
