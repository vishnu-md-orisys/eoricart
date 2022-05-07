<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_address extends Model
{
    protected $fillable = [
    'fullname',
    'mobile',
    'addressline1',
    'addressline2',
    'landmark',
    'city',
    'state',
    'country',
    'pincode'
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}
