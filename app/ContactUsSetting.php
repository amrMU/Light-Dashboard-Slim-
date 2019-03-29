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

   

    public function whatsapp()
    {
        return $this->hasMany('App\ContactInfoWhatsapp','contactinfo_id','id');
    }

    public function phone()
    {
        return $this->hasMany('App\ContactInfoPhone','contactinfo_id','id');
    }
}
