@extends('admin.adminwelcome')
@section('admin.ordered_list')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
   <h1> Your Orders</h1>
   <div style="border: 2px solid black">
    @foreach($products as $product)
    <div class="row searched-item cart-list-div" >
        <div class="col-sm-3">
        <img src="{{ url('images/'.(($product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";>
            </div>
        <div class="col-sm-4">
            <div class="">
                <h2>{{$product->product_name}}</h2>
                <h5>{{$product->product_description}}. &#x20b9;{{$product->product_price}}</h5>
                
                <div class="container">
                    <div class="star-widget">
                        <a href="{{ url('rating/'.$product->id) }}" style="text-decoration: none">
                            <button type="submit" class="btn btn-primary">Add Product Review</button>

                </a>
                </div>
                </div>
                
    </div>
            </div>

               
    </div>
    @endforeach
</div>
</div>
</div></div>
@endsection