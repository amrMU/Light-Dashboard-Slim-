<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;
use App\Http\Requests\Admin\ReplyContactRequest;
use Mail;
use Session;

class contactusController extends Controller
{
    public function index()
    {
	$info = ContactUs::orderBy('created_at','DESC')->get();
    return view('admin.contact_us.index',compact('info'));
    }

    public function show($id)
    {
    	# code...
    }
    public function GetReply($id)
    {
	$info = ContactUs::find($id);
	 ContactUs::find($id)->update(['read'=>'1']);

    return view('admin.contact_us.reply',compact('info'));
    }

    public function PostReply(ReplyContactRequest $request)
    {
		$id = $request->get('id');
		$title = $request->get('title');
		$email = $request->get('email');
		$mms = $request->get('message');
	 ContactUs::find($id)->update(['reply'=>'1']);

		Mail::send('email.reply', ['title' => $title,'mms' =>$mms], function ($message) use ($email,$title)
			 {
			    $message->from('no-reply@rmal.com.sa', 'Support.rmal.com.sa');
			    $message->to($email)->subject($title);
			});
		$message_success = Session::flash('success','تم إرسال الرد للمستخدم');
		return redirect()->back();
    }

    public function destroy($id)
    {
    	ContactUs::destroy($id);
    	$message_success = Session::flash('success','تم حذف الطلب بنجاح');
		return redirect()->back();
    }
}
