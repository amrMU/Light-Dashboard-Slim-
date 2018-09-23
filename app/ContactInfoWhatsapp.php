<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfoWhatsapp extends Model
{
    protected $table = "contact_whatsapp_number"; 
    
    protected $fillable = [
        'contactinfo_id',
        'whatsapp'
    ];
}
