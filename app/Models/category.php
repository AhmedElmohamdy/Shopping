<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     protected $fillable = [
        'category_name',
        'CategoryNameAr',
        'DescriptionAr',
        'description',
        'image',
    ];
    public function Product()
{
    return $this->hasMany(product::class, 'cat_id');
}


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
   

   
}
