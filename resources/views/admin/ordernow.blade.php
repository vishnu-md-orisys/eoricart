@extends('admin.adminwelcome')
@section('admin.ordernow')
<div class="custom-product">
    <div class="container">           
        <table class="table table-bordered">
          <thead>
            <tr>
                <th>Product Image</th>
              <th>Product</th>
              <th>price</th>
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
           <?php 
                   $total = $total + $product->product_price;
            ?>
             @endforeach
            </tr>
          </tbody>
           <td colspan="3"> <h3 style="text-align: center">Total Amount= {{$total }}</h3><td>
        </table>
      </div>
      
      <div class="container custom-login">
        <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
 
         <form action="#" method="POST" id="orderForm" name="orderForm">
           @csrf
           @method('post')
           <h2>Payment Type</h2>
             <div class="form-group">
                <input type="radio" id="paytype" name="paytype" value="POD" required>
                <label for="paytype">Pay on Delivery</label><br>
               @error('paytype')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
             </div>
             <button type="submit" class="btn btn-primary">Order</button>
            </form>

      <div class="container custom-login">
        <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
 
         <form action="#" method="POST" id="orderForm" name="orderForm" enctype="multipart/form-data">
           @csrf
           @method('post')
           <h2>Delivery Address</h2>
             <div class="form-group">
               <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Your Name">
               @error('fullname')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group">
               <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your mobile number">
               @error('mobile')
               <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
               @enderror
             </div>
             <div class="form-group">
                 <textarea  class="form-control" id="addressline1" name="addressline1" placeholder="Enter Your Address"></textarea>
                 @error('addressline1')
                 <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                 @enderror
               </div>
               <div class="form-group">
                <textarea  class="form-control" id="addressline2" name="addressline2" placeholder="Enter Your Address"></textarea>
                @error('addressline2')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <textarea  class="form-control" id="landmark" name="landmark" placeholder="Enter LandMark"></textarea>
                @error('landmark')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your city">
                @error('city')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter Your state">
                @error('state')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter Your country">
                @error('country')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter Your Pincode">
                @error('pincode')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
             <button type="submit" class="btn btn-primary">Add Address</button>
           </form>
 
        </div>
        </div>
    </div>
      
@endsection