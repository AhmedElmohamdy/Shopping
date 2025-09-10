<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
     protected $fillable = [
        'logo',
        'address',
        'phone',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'about_us',
        'email', 
    ];
}
