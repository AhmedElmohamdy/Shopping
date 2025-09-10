<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{

    use HasFactory;


public function images()
{
    return $this->hasMany(ProductImage::class, 'product_id');
}

public function category()
{
    return $this->belongsTo(Category::class, 'cat_id');

}

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'image_name',
        'description',
        'ProdactNameAr',
        'DescriptionAr',
        'cat_id'
    ];

   

}