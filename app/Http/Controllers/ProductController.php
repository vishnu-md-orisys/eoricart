<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;


class ProductController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['products'] = product::orderBy('id','desc')->paginate(5);
return view('admin.productlist', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('admin.productform');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'product_name' => 'required',
'product_description' => 'required',
'product_price'=>'required',
'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
]);
$Product = new product;
$Product->product_name = $request->product_name;
$Product->product_description = $request->product_description;
$Product->product_price = $request->product_price;
$Product->status = config('constants.STATUS.ACTIVE');  // for adding constant value to status inside config(folder),
$Product->save();                                             //then file constant.php, return value for status.


$fileName = time().$request->file('product_image')->getClientOriginalName();
$path = $request->file('product_image')->storeAs('images', $fileName, 'public');

Product_image::create(['product_id' => $Product->id,
'product_imagename' => $fileName
]);
return redirect()->route('product.index')
->with('success','product has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\product  $Product
* @return \Illuminate\Http\Response
*/
public function show(product $Product)
{
return view('products.show',compact('Product'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\product  $Product
* @return \Illuminate\Http\Response
*/
public function edit(Product $Product)
{
return view('admin.editproduct',compact('Product'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\product  $Product
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $request->validate([
    'product_name' => 'required',
    'product_description' => 'required',
    'product_price'=>'required',
    'product_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ]);
    $Product = product::find($id);
    $Product->product_name = $request->product_name;
    $Product->product_description = $request->product_description;
    $Product->product_price = $request->product_price;
    $Product->status = config('constants.STATUS.ACTIVE');
    $Product->save();
    
    
    $fileName = time().$request->file('product_image')->getClientOriginalName();
    $path = $request->file('product_image')->storeAs('images', $fileName, 'public');
    
    Product_image::create(['product_id' => $Product->id,
    'product_imagename' => $fileName
    ]);
    return redirect()->route('product.index')
    ->with('success','product has been updated successfully.');
    }



//     public function displayImage($filename)
// {
//     $path = storage_public('images/' . $filename);
//     if (!File::exists($path)) {
//         abort(404);
//     }
//     $file = File::get($path);
//     $type = File::mimeType($path);
//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);
//     return $response;
// }

    
/**
* Remove the specified resource from storage.
*
* @param  \App\product  $Product
* @return \Illuminate\Http\Response
*/
public function destroy(product $Product)
{
    $Product->delete();
return redirect()->route('product.index')
->with('success','Product has been deleted successfully');
}
}