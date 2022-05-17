<?php

namespace App\Http\Controllers;


use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Customer_review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use session;

class UserController extends Controller
{
    public function index()
{
$data['products'] = product::orderBy('id','desc')->with('customer_reviews')->paginate(5);  //user products listing
// dd($data);
return view('admin.userhome', $data);
}
}


