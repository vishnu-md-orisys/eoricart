<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_detail extends Model
{

    protected $fillable = [
        'order_id',
        'amount',
        'status'
    ];
    use HasFactory;
    public function order_detail(){
        return $this->belongsTo(Order_detail::class);
    }
}
