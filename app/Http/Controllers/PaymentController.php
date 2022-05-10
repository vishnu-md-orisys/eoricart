<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Order_detail;
use App\Models\Payment_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;


class PaymentController extends Controller
{
   static function update(Request $request, $order_id)                //updates payment_id on order_details table
   {                                                                       //default value is null
    $payment = payment_detail::where('order_id',$order_id)->first();
 
    order_detail::where('id',$payment->order_id)->update(['payment_id' => $payment->id
          ]);
        
    return redirect() -> route('orderedlist');
    }
}
