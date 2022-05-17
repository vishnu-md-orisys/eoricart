@extends('admin.adminwelcome')
@section('admin.mycart')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
    <h4 style="color:rgb(133, 155, 13)";>Result For products</h4><br>
    <a class="btn btn-success" href="/ordernow">Order Now</a>
    <a class="btn btn-success" href="/users">Add Products</a><br><br>
    @foreach($products as $product)
    <div class="row searched-item cart-list-div">
        <div class="col-sm-3">
            <a href="{{ url('productdetails/'.$product->product->id) }}"> <img src="{{ url('images/'.(($product->product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";><a>
            </div>
        <div class="col-sm-4">
            <div class="">
                <a href="{{ url('productdetails/'.$product->product->id) }}" style="text-decoration: none">
                     <h2>{{$product->product->product_name}}</h2></a>
                <h5>{{$product->product->product_description}}</h5>
             <form action="/edit_quantity" method="POST">
                @csrf
                @method('post')
                <input type="hidden" id="product_id" name="product_id" value={{$product->product->id}}>
                <label for="quantity">Quantity</label>
                <select name="quantity" id="quantity" value="{{$product->quantity}}">
                   <?php $quan= $product->quantity ?>
                  <option selected  value={{$product->quantity}}>{{$product->quantity}}</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Changing quantity are you sure')">Save changes</button>
                </form>
            <h5>&#x20b9;{{$product->product->product_price}}</h5>
            </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ url('cart_products/'.$product->product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                   <button class="btn btn-warning">Remove From cart</button>
                    </form>
                        </div>
    </div>
    @endforeach
</div>
<a class="btn btn-success" href="/ordernow">Order Now</a>
    <a class="btn btn-success" href="/users">Add Products</a><br><br>

</div></div>
@endsection