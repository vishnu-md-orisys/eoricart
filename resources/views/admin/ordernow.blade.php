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
                <td> <img src="{{ url('images/'.(($product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";></td>
              <td>{{$product->product_name}}<br><p>Description:</p>{{$product->product_description}}
            </td>
              <td>{{$product->product_price}}</td>
              <td>sample</td>
              <td>{{$product->product_price * 3 }} </td>

           <?php 
                   $total = $total + $product->product_price;
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