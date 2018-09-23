<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = "cities";
    protected $fillable = [
        'name_ar',
        'name_en',
        'country_id'
    ];

    public function countries(){
       return $this->belongsTo('App\Country','country_id');
    }
}
