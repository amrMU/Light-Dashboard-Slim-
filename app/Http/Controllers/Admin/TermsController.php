<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Terms;
use App\Http\Requests\Admin\TermsRequest;
use Session;

class TermsController extends Controller
{
     public function create()
    {
      $terms = Terms::first();
      return view('admin.terms.create',compact('terms'));
    }

    public function store(TermsRequest $request)
    {
        $check_terms = Terms::count();
        if ($check_terms > 0 ) {
            $get_terms = Terms::first();
            $update_terms = Terms::find($get_terms->id)->update($request->all());
        }else{
            $create_terms = Terms::create($request->all());
        }
        Session::flash('success','تم تحديث البيانات بنجاح!');
        return redirect()->back();
    }
}
