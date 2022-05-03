@extends('admin.adminwelcome')

@section('admin.editproduct')

   <div class="container custom-login">
       <div class="row">
       <div class="col-sm-4 col-sm-offset-4">
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('product.index') }}" enctype="multipart/form-data"> Back</a>
          </div>
        <form action="{{ route('product.update',$Product->id)}}" method="POST" id="create-form" enctype="multipart/form-data">
          @csrf
@method('put')
            <div class="form-group">
              <label for="productName">Product Name:</label>
              <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product Name" value={{$Product->product_name}}>
              @error('product_name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="productDescription">Product Description:</label>
              <textarea class="form-control" id="product_description" name="product_description" placeholder="Product Description" ><?php echo $Product->product_description; ?> </textarea>
              @error('product_description')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="productImage">Product Image:</label>
                <input type="file" class="form-control" id="product_image" name="product_image" >
                @error('product_name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="productPrice">Product Price:</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price" value={{$Product->product_price}}>
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