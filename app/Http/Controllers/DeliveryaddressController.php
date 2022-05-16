<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Delivery_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;

class DeliveryaddressController extends Controller
{
    public function index()
    {
     $userId=Auth::id();
     $delivery_address= Delivery_address::where('user_id',$userId)->get();
     return view('dashboard', $delivery_address);

    }
    public function create()
    {
        $userId=Auth::id();
        // $data['delivery_address']= Delivery_address::where('user_id', '=' $userId);
    return view('admin.deliveryaddress');
    }

    public function store(Request $request)
    {
   $request->validate([
    'fullname'=> 'required',
    'mobile'=> 'required',
    'addressline1'=> 'required',
    'addressline2'=> 'required',
    'landmark'=> 'required',
    'city'=> 'required',
    'state'=> 'required',
    'country'=> 'required',
    'pincode'=> 'required'
   ]);
   $delivery_address = new Delivery_address;
   $delivery_address-> user_id = Auth::id();
   $delivery_address-> fullname = $request-> fullname;
   $delivery_address-> mobile = $request-> mobile;
   $delivery_address-> addressline1 = $request-> addressline1;
   $delivery_address-> addressline2 = $request-> addressline2;
   $delivery_address-> landmark = $request-> landmark;
   $delivery_address-> state = $request-> state;
   $delivery_address-> city = $request-> city;
   $delivery_address-> country = $request-> country;
   $delivery_address-> pincode = $request-> pincode;
   $delivery_address->save();  
    return redirect()->route('orderedlist')
    ->with('successs','Ordered Succesfully');
    }
}
