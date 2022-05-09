@extends('admin.adminwelcome')
@section('admin.adddresslist')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
    <h1>Choose your Location</h1>
    @foreach($addresses as $address)
    <div class="row searched-item cart-list-div">
       
        <div class="col-sm-4">
            <div class="">
                <h2>{{$product->product_name}}</h2>
                <h5>{{$product->product_description}}</h5>
                <h5>&#x20b9;{{$product->product_price}}</h5>
            </div>
                </div>
                    <form action="#" method="post">
                        @csrf
                        @method('post')
                   <button class="btn btn-warning">Add Address</button>
                    </form>
    </div>
    @endforeach
</div>
</div></div>
@endsection