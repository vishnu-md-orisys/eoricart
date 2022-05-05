@extends('admin.adminwelcome')
@section('admin.mycart')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
    <h4>Result For products</h4><br>
    <a class="btn btn-success" href="/ordernow">Order Now</a><br><br>
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
                <div class="col-sm-3">
                    <form action="{{ url('cart_products/'.$product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                   <button class="btn btn-warning">Remove From cart</button>
                    </form>
                        </div>
    </div>
    @endforeach
</div>
<a class="btn btn-success" href="/ordernow">Order Now</a><br><br>

</div></div>
@endsection