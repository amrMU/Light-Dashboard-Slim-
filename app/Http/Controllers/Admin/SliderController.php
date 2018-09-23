<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Http\Requests\Admin\SliderRequest;
use Session;

class SliderController extends Controller
{
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $create = Slider::create($request->all());
        Session::flash('success','تم إضافة عرض جديد!');
        return redirect()->back();
    }

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));   
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));   
    }

    public function update(SliderRequest $request,$id)
    {
        $create = Slider::find($id)->update($request->all());
        Session::flash('success','تم تحديث العرض!');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $destroy = Slider::destroy($id);
        Session::flash('success','تم حذف العرض بنجاح!');
        return redirect()->back();
    }
}
