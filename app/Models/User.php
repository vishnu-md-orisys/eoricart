<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function role(){
        return $this->hasMany(Role::class);
    }
    public function cart_products(){
        return $this->belongstoMany(Product::class,'cart_items');
    }
    public function deliveries(){
        return $this->belongstoMany(Product::class,'delivery_addresses');
    }

    public function customer_reviews(){
        return $this->belongstoMany(Product::class,'customer_reviews');
    }
    public function order_item(){
        return $this->hasMany(Order_item::class);
    }
    // public function cart_tables(){
    //     return $this->belongstomany(Cart_item::class,'products');
    // }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}