@extends('admin.adminwelcome')
@section('admin.ordernow')
<div class="custom-product">
    <div class="container">           
        <table class="table table-bordered">
          <thead>
            <tr>
                <th>Product Image</th>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </tr>
          </thead>
         <?php $total = 0; ?>
          @foreach($products as $product)
          <tbody>
            <tr>
                <td>             <a href="{{ url('productdetails/'.$product->product->id) }}">
                  <img src="{{ url('images/'.(($product->product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";> </a></td>
              <td>{{$product->product->product_name}}<br><p>Description:</p>{{$product->product->product_description}}
            </td>
              <td>{{$product->product->product_price}}</td>
              <td>{{$product->quantity}}</td>
              <?php $price= $product->product->product_price * $product->quantity; ?>
              <td>{{$product->product->product_price * $product->quantity }} </td>

           <?php 
                   $total = $total + $price;
            ?>
             @endforeach
            </tr>
          </tbody>
           <td colspan="5"> <h3 style="text-align: center">Total Amount= {{$total }}</h3><td>
        </table>
      </div>
      
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
    
         <form action="/order" method="POST" id="paymentForm" name="paymentForm">
           @csrf
           @method('post')
           <h2>Payment Type</h2>
             <div class="form-group">
              <input type="hidden" id="total" name="total" value={{$total }} >
                <input type="radio" id="paytype" name="paytype" value="POD" required>
                <label for="paytype">Pay on Delivery</label><br>
               @error('paytype')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
             </div>
             <button type="submit" class="btn btn-primary">Order</button>
            </form>
    
      
@endsection