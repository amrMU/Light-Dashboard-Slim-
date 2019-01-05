<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUsSetting,App\ContactInfoPhone,App\ContactInfoWhatsapp;
use App\Repositories\SettingsRepositories as Setting;
use App\Repositories\PhoneSettingsInfoRepositories as Phone;
use App\Repositories\WhatsappSettingsInfoRepositories as Whatsapp;

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

    public function show()
    {
        $check_settings =  $this->setting->all()->count();

        if ($check_settings >0) {
            $info = $this->setting->with(['whatsapp','phone'])->findByFirst(['*']);

            $mape = Mapper::map($info->long,$info->lat, ['eventBeforeLoad' => 'console.log("before load");']);
        }

        return view('admin.contact_us.map',compact('mape','info'));
    }


    public function create()
    {

        $info = $this->setting->with(['whatsapp','phone'])->findByFirst(['*']);

        return view('admin.contact_us.setting',compact('mape','info'));
    }

    public function store(Request $request)
    {
//        dd($this->setting->all()->count());

        $check_settings = $this->setting->all()->count();
        if ($check_settings > 0 ) {
            $get_settings = $this->setting->findByFirst(['*']);
            $update_settings =$this->setting->find($get_settings->id)->update($request->except(['phone','whatsapp']));
//             dd($get_settings);

            if($request->has('phone')){
                $this->phone->deletWhere('contactinfo_id',$get_settings->id);
                foreach ($request->phone as $key => $phone_info) {
                    if($phone_info != ''){
                        $this->phone->create([
                            'phone'=>$phone_info,
                            'contactinfo_id'=>$get_settings->id
                            ]);
                    }
                }

            }
            if($request->has('whatsapp')){
                $this->whatsapp->deletWhere('contactinfo_id',$get_settings->id);

                foreach ($request->whatsapp as $key => $whatsapp) {
                 if($whatsapp != ''){
                     $this->whatsapp->create([
                        'whatsapp'=>$whatsapp,
                        'contactinfo_id'=>$get_settings->id
                        ]);
                }
            }
        }
//            dd($this->setting->findByFirst(['*']));


        }else{
       
        $create_settings = $this->setting->create($request->except(['phone','whatsapp']));
        if($request->has('phone')){
            foreach ($request->phone as $key => $phone) {
                $this->phone->create([
                    'phone'=>$phone,
                    'contactinfo_id'=>$create_settings->id
                    ]);
            }

        }
        
        if($request->has('whatsapp')){
            $this->whatsapp->deletWhere('contactinfo_id',$get_settings->id);
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
