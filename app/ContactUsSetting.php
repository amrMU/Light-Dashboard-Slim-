<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Input;

class ContactUsSetting extends Model
{
    protected $table = 'contactus_settings';
    protected $fillable = [
    	'site_name',
        'description_ar',
        'description_en',
    	'meta_tags',
    	'email',
    	'phone',
    	'lat',
    	'long',
		'address',
		'logo',
		'fburl',
		'twitter_url',
		'google_url',
		'instgram_url',
		'youtube_url'
    ];

    public function setLogoAttribute($logo)
    {
        if (Input::hasFile('logo')) {
            //time 
            $time = time();
            // get file extention
            $ext  =Input::file('logo')->getClientOriginalExtension();
            //make name as time and extention
            $fullname = $time . '.' . $ext;
            //uplode logo to path
            Input::file('logo')->move(public_path() .'/uploads/images/logo', $fullname);
            //get image with path
            $path ='/uploads/images/logo';
            //upload to thumb path

            // save image name to data base
            $this->attributes['logo'] =$path.'/'.$fullname;
        }

    }

    public function whatsapp()
    {
        return $this->hasMany('App\ContactInfoWhatsapp','contactinfo_id','id');
    }

    public function phone()
    {
        return $this->hasMany('App\ContactInfoPhone','contactinfo_id','id');
    }
}
