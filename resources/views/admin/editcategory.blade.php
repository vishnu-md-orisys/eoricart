@extends('admin.adminwelcome')

@section('admin.editcategory')

   <div class="container custom-login">
       <div class="row">
       <div class="col-sm-4 col-sm-offset-4">

        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('category.index') }}" enctype="multipart/form-data"> Back</a>
          </div>

        <form name="editcategory" action="{{ route('category.edit')}}" method="POST" id="create-form" enctype="multipart/form-data">
          @csrf
@method('post')
            <div class="form-group">
              <label for="categoryName">Category Name:</label>
              <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Product Name">
              @error('category_name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="categoryImage">Category Image:</label>
                <input type="file" class="form-control" id="category_image" name="category_image" >
                @error('category_image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

       </div>
       </div>
   </div>
@endsection