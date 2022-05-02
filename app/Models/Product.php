<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function categories_products(){
        return this->hasMany(Categories_product::class);
    }
    public function product_images(){
        return this->belongsTo(Product_image::class);
    }
}
