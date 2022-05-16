<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Customer_review;

class UserController extends Controller
{
    public function index()
{
$data['products'] = product::orderBy('id','desc')->with('customer_review')->paginate(5);  //user products listing
// dd($data);
return view('admin.userhome', $data);
}
}


