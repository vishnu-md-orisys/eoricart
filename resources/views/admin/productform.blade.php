@extends('admin.adminwelcome')

@section('admin.productform')

<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('product.index') }}" enctype="multipart/form-data"> Back</a>
  </div>

   <div class="container custom-login">
       <div class="row">
       <div class="col-sm-4 col-sm-offset-4">

        <form action="{{ route('product.store')}}" method="POST" id="productForm" name="productForm" enctype="multipart/form-data">
          @csrf
          @method('post')
            <div class="form-group">
              <label for="productName">Product Name:</label>
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name">
              @error('product_name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="productDescription">Product Description:</label>
              <textarea class="form-control" id="product_description" name="product_description" placeholder="Product Description"></textarea>
              @error('product_description')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" class="form-control" id="product_image" name="product_image" >
                @error('product_image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="productPrice">Product Price:</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price">
                @error('product_price')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

       </div>
       </div>
   </div>
@endsection