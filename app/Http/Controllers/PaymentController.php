<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Payment_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;


class PaymentController extends Controller
{
    public function store(Request $request){
    // $payment =new Payment_details;
    // $payment->order_id = 1;
    // $payment->amount= $request-> amount;
    // $payment->status = 1;
    // $payment->save();
    return redirect()-> route('deliveryaddress');
    }
}
