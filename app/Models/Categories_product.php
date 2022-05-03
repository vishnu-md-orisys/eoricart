<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories_product extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTomany(Category::class);
    }
    public function products(){
        return $this->belongsTomany(Product::class);
    }
}
