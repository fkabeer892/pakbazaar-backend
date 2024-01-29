<?php

namespace App\Models;
use App\Model;

class Product extends Model{

    protected $fillable = [
        "name", "sku", "category_id", "brand_id"
    ];

    
    function cartItem(){
        return $this->hasMany( CartItem::class);
    }

    
    function featureProduct(){
        return $this->hasMany( FeatureProduct::class);
    }

    
    function orderItem(){
        return $this->hasMany( OrderItem::class);
    }

    
    function orderReview(){
        return $this->hasMany( OrderReview::class);
    }

    
    function productAttribute(){
        return $this->hasMany( ProductAttribute::class);
    }

    
    function productStock(){
        return $this->hasMany( ProductStock::class);
    }

    
    function promotion(){
        return $this->hasMany( Promotion::class);
    }

    
    function relatedProduct(){
        return $this->hasMany( RelatedProduct::class);
    }

    
    
    function brand(){
        return $this->belongsTo( Brand::class);
    }

    
    function category(){
        return $this->belongsTo( Category::class);
    }

    
}
