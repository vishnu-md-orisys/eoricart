<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{

    protected $fillable = [
        'product_id',
        'product_imagename'
    ];
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
