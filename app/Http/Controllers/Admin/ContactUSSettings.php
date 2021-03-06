<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUsSetting,App\ContactInfoPhone,App\ContactInfoWhatsapp;
use App\Repositories\SettingsRepositories;
use App\Repositories\PhoneSettingsInfoRepositories;
use App\Repositories\WhatsappSettingsInfoRepositories;
use Illuminate\Support\Facades\Input;

use Mapper;
use Session;

class ContactUSSettings extends Controller
{
    protected $setting;
    protected $phone;
    protected $whatsapp;

    public function __construct(
        SettingsRepositories $setting,
        PhoneSettingsInfoRepositories $phone,
        WhatsappSettingsInfoRepositories $whatsapp
    ){
        $this->setting = $setting;
        $this->phone = $phone;
        $this->whatsapp = $whatsapp;
    }


    /**
     *
     * return view with base informations
     **/
    public function create()
    {

        $info = $this->setting->with(['whatsapp','phone'])->findByFirst(['*']);

        return view('admin.contact_us.setting',compact('mape','info'));
    }

    public function store(Request $request)
    {

        $base  = $this->setting->GetProgress($request->except(['phone','whatsapp','_token']));



        if($request->has('phone')){
            $phone = $this->phone->GetProgress($this->setting->findByFirst(['*'])->id,$request->only(['phone'])) ;
        }
       
        if($request->has('whatsapp')){
          $whatsapp = $this->whatsapp->GetProgress($this->setting->findByFirst(['*'])->id,$request->only(['whatsapp'])) ;
        }

    Session::flash('success',trans('home.message_success'));
    return redirect()->back();
}

}
