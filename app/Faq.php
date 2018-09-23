<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = "faq";
    protected $fillable = [
			    	'title_ar',
			    	'title_en',
			    	'content_ar',
			    	'content_en',
    			];
}
