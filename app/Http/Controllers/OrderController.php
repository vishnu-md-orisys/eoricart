<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Order_detail;
use App\Models\Payment_detail;
use App\Models\Delivery_address;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use App\Models\Product_image;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
      public function index()
 {
      $user_id=Auth::id();
      $order_details = Order_detail::where('user_id',$user_id)->get();
      $data = [
        'products' => []
      ];
      foreach ($order_details as $order_detail) 
      {
      $order_products = Order_item::where('order_id',$order_detail->id)->pluck('product_id')->toArray();
      $products = Product::find($order_products);
      foreach ($products as $product) {
        $data['products'][] = $product;
      }
      }
      $deliveryadress=Delivery_address::where('user_id',$user_id)->get();
      if($deliveryadress!=''){
      $cartitems=Cart_item::where('user_id',$user_id)->get();
      Cart_item::destroy($cartitems);
      return view('admin.ordered_list', $data);
      }
      else{
        return view('admin.deliveryaddress');
      }    
 }


 public function show()
 {
  $user_id=Auth::id();
  $order_details = Order_detail::where('user_id',$user_id)->get();
  $data = [
    'products' => []
  ];
  foreach ($order_details as $order_detail) 
  {
  $order_products = Order_item::where('order_id',$order_detail->id)->pluck('product_id')->toArray();
  $products = Product::find($order_products);
  foreach ($products as $product) {
    $data['products'][] = $product;
  }
  }
 return view('admin.ordered_list', $data);

 }


 
    public function store(Request $request)
    {
        $order = new order_detail;
        $order->user_id=Auth::id();
        $order->payment_id = null;
        $order->total = $request->total;
        $order->status = 1;
        $order->save();
    
        Payment_detail::create(['order_id' => $order->id,
        'amount' => $order->total,'status'=> 1
        ]);
        $cart_products = Cart_item::where('user_id',$order->user_id)->get();
        foreach ($cart_products as $cart_product) {
            $product = Product::find($cart_product->product_id);
            Order_item::create(['order_id'=> $order->id,
            'product_id'=>  $product->id,
            'amount' => $product->product_price,
            'quantity' => $cart_product->quantity]);
        }
        
    return redirect()-> route('payment',$order->id);
    }

}

