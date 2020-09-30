<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    //

     protected $fillable = [
        'category_slug', 'category', 'category_image','category_status',
    ];
}
