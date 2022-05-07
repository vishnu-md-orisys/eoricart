@extends('admin.adminwelcome')

@section('admin.deliveryaddress')

    <div class="container custom-login">
    <div class="row">
    <div class="col-sm-4 col-sm-offset-4">

     <form action="/deliveryaddress" method="POST" id="orderForm" name="orderForm" enctype="multipart/form-data">
       @csrf
       @method('post')
       <h2 style="color:orange">Delivery Address</h2>
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
         <button type="submit" class="btn btn-primary" onclick="return confirm('Confirm Placing Order')">Confrim order</button>
       </form>

    </div>
    </div>
</div>