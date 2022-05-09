<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'amount',
        'quantity'
    ];
    use HasFactory;
    public function order_detail(){
        return $this->hasMany(Order_detail::class);
    }
    public function product(){
        return $this->hasMany(Product::class);
    }
}


