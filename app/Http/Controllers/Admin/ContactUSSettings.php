<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mapper;
use App\ContactUsSetting,App\ContactInfoPhone,App\ContactInfoWhatsapp;
use Session;

class ContactUSSettings extends Controller
{
    public function show()
    {
        $check_settings = ContactUsSetting::count();

        if ($check_settings >0) {
            $info = ContactUsSetting::with(['whatsapp','phone'])->first();

            $mape = Mapper::map($info->long,$info->lat, ['eventBeforeLoad' => 'console.log("before load");']);
        }

        return view('admin.contact_us.map',compact('mape','info'));
    }


    public function create()
    {

        $info = ContactUsSetting::with(['whatsapp','phone'])->first();

        return view('admin.contact_us.setting',compact('mape','info'));
    }

    public function store(Request $request)
    {
        $check_settings = ContactUsSetting::count();
        if ($check_settings > 0 ) {
            $get_settings = ContactUsSetting::first();
            $update_settings = ContactUsSetting::find($get_settings->id)->update($request->except(['phone','whatsapp']));
            // dd($get_settings->id);

            if($request->has('phone')){
                ContactInfoPhone::where('contactinfo_id',$get_settings->id)->delete();
                foreach ($request->phone as $key => $phone) {
                    if($phone != ''){
                        ContactInfoPhone::create([
                            'phone'=>$phone,
                            'contactinfo_id'=>$get_settings->id
                            ]);
                    }
                }

            }
            if($request->has('whatsapp')){
                ContactInfoWhatsapp::where('contactinfo_id',$get_settings->id)->delete();

                foreach ($request->whatsapp as $key => $whatsapp) {
                 if($whatsapp != ''){
                    ContactInfoWhatsapp::create([
                        'whatsapp'=>$whatsapp,
                        'contactinfo_id'=>$get_settings->id
                        ]);
                }
            }
        }

    }else{
       
        $create_settings = ContactUsSetting::create($request->except(['phone','whatsapp']));
        if($request->has('phone')){
            foreach ($request->phone as $key => $phone) {
                ContactInfoPhone::create([
                    'phone'=>$phone,
                    'contactinfo_id'=>$create_settings->id
                    ]);
            }

        }
        
        if($request->has('whatsapp')){
                ContactInfoWhatsapp::where('contactinfo_id',$get_settings->id)->delete();

                foreach ($request->whatsapp as $key => $whatsapp) {
                 if($whatsapp != ''){
                    ContactInfoWhatsapp::create([
                        'whatsapp'=>$whatsapp,
                        'contactinfo_id'=>$get_settings->id
                        ]);
                }
            }
        }

    }
    Session::flash('success','تم تحديث البيانات بنجاح!');
    return redirect()->back();
}

}
