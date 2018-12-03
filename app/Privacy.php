<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $table = "privacy";
    protected $fillable = [
        'content_ar','cotent_en'
    ];
}
