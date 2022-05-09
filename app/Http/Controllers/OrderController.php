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


class OrderController extends Controller
{
    public function store(Request $request){
        $order = new order_detail;
        $order->user_id=Auth::id();
        $order->payment_id = null;
        $order->total = $request->total;
        $order->status = 1;
        $order->save();
        Payment_detail::create(['order_id' => $order->id,
        'amount' => $order->total,'status'=> 1
        ]);
    return redirect()-> route('payment',$order->id);
    }
}
