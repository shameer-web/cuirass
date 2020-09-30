<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

     protected $fillable = [
       'product_category_id','product_slug','product_title','product_short_description','product_description','product_image','product_price','product_offer_price','product_type','product_sku','product_status'
    ];




    // public function category()
    // {
    //     return $this->belongsTo('App\Product_category','product_category_id');
    // }

    public function category(){
    	return $this->belongsTo(Product_category::class,'product_category_id','id');
    }


    public function images()
    {
        return $this->hasMany('App\Product_image','product_id');
    }
}
