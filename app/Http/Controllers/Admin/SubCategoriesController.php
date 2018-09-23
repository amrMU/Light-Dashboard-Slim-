<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Http\Requests\Admin\SubCategoriesRequest;
use App\Category;
use Session;


class SubCategoriesController extends Controller
{
       public function index($id)
    {
        $categories = Category::where('parent_id',$id)->get();
        return view('admin.categories.sub_categories.index',compact('categories'));
    }
    public function create($id)
    {
    	$parent_id = $id;
        return view('admin.categories.sub_categories.create',compact('parent_id'));
    }

    public function store(SubCategoriesRequest $request,$id)
    {
    	$create = Category::create([
    		'name_ar'=>$request->name,
    		'name_en'=>$request->name_en,
    		'parent_id'=>$id,
    	]);
    
    	Session::flash('success','تم إضافة قسم  جديد');
    	return redirect()->back();
    }

    public function edit($id)
    {
        $info = Category::find($id);
        return view('admin.categories.sub_categories.edit',compact('info'));
    }

    public function update(SubCategoriesRequest $request,$id)
    {
        $update = Category::find($id)->update([
        	'name_ar'=>$request->name,
    		'name_en'=>$request->name_en,
    	]);
    
        Session::flash('success','تم تعديل بيانات  القسم');
        return redirect()->back();
    }

}
