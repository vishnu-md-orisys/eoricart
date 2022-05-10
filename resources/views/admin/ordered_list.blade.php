@extends('admin.adminwelcome')
@section('admin.orderedlist')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
    @foreach($products as $product)
    <div class="row searched-item cart-list-div">
        <div class="col-sm-3">
        <img src="{{ url('images/'.(($product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";>
            </div>
        <div class="col-sm-4">
            <div class="">
                <h2>{{$product->product_name}}</h2>
                <h5>{{$product->product_description}}</h5>
                <h5>&#x20b9;{{$product->product_price}}</h5>
            </div>
                </div>
                
    </div>
    @endforeach
</div>
</div></div>
@endsection