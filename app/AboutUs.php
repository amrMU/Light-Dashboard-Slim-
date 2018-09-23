<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class AboutUs extends Model
{  
    protected $table = 'about_us';
    protected $fillable = [
        'content_ar','content_en','image','mission_ar','mission_en','history_ar','history_en',
    ];

    public function setImageAttribute($image)
	{
		if (Input::hasFile('image')) {
			//time 
			$time = time();
			// get file extention
			$ext  =Input::file('image')->getClientOriginalExtension();
			//make name as time and extention
			$fullname = $time . '.' . $ext;
			//uplode image to path
			Input::file('image')->move(public_path() .'/uploads/images/sliders', $fullname);
			//get image with path
			$path ='/uploads/images/sliders';
			//upload to thumb path

            // save image name to data base
			$this->attributes['image'] =$path.'/'.$fullname;
		}

	}
}
