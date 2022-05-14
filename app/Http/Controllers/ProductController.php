<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Cart_item;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Customer_review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use session;


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

    public function addToCart(Request $request){
        if($request->session()->has('user'))
        {
            return redirect('/register');
    }
    else{
        $userid = Auth::id();
        $cart=new Cart_item;
        $cart->user_id=Auth::id();
        $cart->product_id=$request->product_id;
        $cart->quantity=$request->quantity;
        $cartitems=Cart_item::where('user_id',$userid)->where('product_id',$cart->product_id)->first();
        if( isset($cartitems) &&  $userid ==   $cartitems->user_id &&  $cart->product_id ==  $cartitems->product_id )
        {
        $oldcart = Cart_item::where('user_id',$userid)->where('product_id',$cart->product_id)->first();
        $oldcart->quantity +=  $cart->quantity  ;
        $oldcart->save();
        return redirect('/mycart');
        }
        else{

        $cart->save();
        return redirect('/mycart');  
    }
    }
  }
    static function cartitem(){
        $userId=Auth::id();
        return Cart_item::where('user_id',$userId)->count();
          }

         public function myCartList()
          {
            $userId=Auth::id();
            $user = Auth::user();
           $products = $user->cart_products;   
            // $carts = $user->cart_tables;  
            // dd($carts);

            
          //already made a many to many in user model functn(cart_products) so this line works 
            return view('admin.mycart', ['products'=>  $products]);
                                                                    
          }      
          public function orderNow()
            {
                $userId=Auth::id();
                $user = Auth::user();
                $products = $user->cart_products;   
              //already made a many to many in user model functn(cart_products) so this line works 
                return view('admin.ordernow', ['products'=>$products]);
              }  
          
          public function search(Request $request)
          {
             $data = product::where('product_name','like','%'.$request->input('query').'%')
            ->get();
            return view('admin.search',['products'=>$data]);
          }
        

          public function ratingindex(Request $request, $id)
          {
            $data= product::where('id',$id)->get();
            return view('admin.productreview',['products'=>$data]);
          }
          public function rating(Request $request, $id)
          {
            $request->validate([
              'rating' => 'required'
              ]);

              $userid = Auth::id();
              $rating = Customer_review::where('user_id',$userid)->where('product_id',$id)->first();
              
              if( isset($rating) && $userid ==  $rating->user_id &&  $id ==  $rating->product_id )
              {
              $newreview = Customer_review::where('product_id',$id)->where('user_id',$userid)->first();
              $newreview->rating = $request->rating;
              $newreview->review = $request->review;
              $newreview->save();
              return redirect('/users');
              }
              else{

              $review = new Customer_review;
              $review->user_id = Auth::id();
              $review->product_id = $id;
              $review->rating = $request->rating;
              $review->review = $request->review;
              $review->save();
              return redirect('/users');
              }
          }


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


public function cartdestroy(Product $product)
{
    $user = Auth::user();
    $user->cart_products()->detach([$product->id]);
    return redirect()->route('mycart')
->with('success','Product removed successfully');
}
}