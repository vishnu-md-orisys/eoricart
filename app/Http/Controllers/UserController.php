<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_image;

class UserController extends Controller
{
    public function index()
{
$data['products'] = product::orderBy('id','desc')->paginate(5);
return view('admin.userhome', $data);
}
}


