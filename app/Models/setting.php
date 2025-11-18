<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
     protected $fillable = [
        'logo',
        'address',
        'address_ar',
        'phone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'about_us',
        'about_us_ar',
        'email', 
    ];
}
