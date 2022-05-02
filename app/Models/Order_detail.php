<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    public function user(){
        return this->belongsTo(User::class);
    }
    public function payment_details(){
        return this->belongsTo(payment_details::class);
    }
}
