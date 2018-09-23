<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfoPhone extends Model
{
    protected $table = "phones_contact_info"; 
    
    protected $fillable = [
        'contactinfo_id',
        'phone'
    ];
}
