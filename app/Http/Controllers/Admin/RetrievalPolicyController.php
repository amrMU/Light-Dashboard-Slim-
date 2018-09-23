<?php 


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Privacy;
use App\Http\Requests\Admin\RetrievalPolicyRequest;
use Session;

class RetrievalPolicyController extends controller
{
	 public function create()
    {
      $info = Privacy::first();
      return view('admin.privacy.create',compact('info'));
    }

    public function store(RetrievalPolicyRequest $request)
    {
        $check_privacy = Privacy::count();
        if ($check_privacy > 0 ) {
            $privacy = Privacy::first();
            $update_Privacy = Privacy::find($privacy->id)->update([
                'content_ar'=>$request->content_ar,
                'content_en'=>$request->content_en,
            ]);
        }else{
            $create_Privacy = Privacy::create([
                'content_ar'=>$request->content_ar,
                'content_en'=>$request->content_en,
            ]);
            
        }
        Session::flash('success','تم تحديث البيانات بنجاح!');
        return redirect()->back();
    }
	
}