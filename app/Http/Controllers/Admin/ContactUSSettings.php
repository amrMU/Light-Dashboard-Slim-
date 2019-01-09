<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUsSetting,App\ContactInfoPhone,App\ContactInfoWhatsapp;
use App\Repositories\SettingsRepositories as Setting;
use App\Repositories\PhoneSettingsInfoRepositories as Phone;
use App\Repositories\WhatsappSettingsInfoRepositories as Whatsapp;
use Illuminate\Support\Facades\Input;

use Mapper;
use Session;

class ContactUSSettings extends Controller
{
    protected $setting;
    protected $phone;
    protected $whatsapp;

    public function __construct(Setting $setting,Phone $phone,Whatsapp $whatsapp)
    {
        $this->setting = $setting;
        $this->phone = $phone;
        $this->whatsapp = $whatsapp;
    }



    public function create()
    {

        $info = $this->setting->with(['whatsapp','phone'])->findByFirst(['*']);

        return view('admin.contact_us.setting',compact('mape','info'));
    }

    public function store(Request $request)
    {

        $base  = $this->setting->progress($request->except(['phone','whatsapp','_token']));



        if($request->has('phone')){
            $phone = $this->phone->progress($this->setting->findByFirst(['*'])->id,$request->only(['phone'])) ;
        }
       
        if($request->has('whatsapp')){
          $whatsapp = $this->whatsapp->progress($this->setting->findByFirst(['*'])->id,$request->only(['whatsapp'])) ;
        }


    Session::flash('success',trans('home.message_success'));
    return redirect()->back();
}

}
