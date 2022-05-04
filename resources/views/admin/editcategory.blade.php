@extends('admin.adminwelcome')

@section('admin.editcategory')

   <div class="container custom-login">
       <div class="row">
       <div class="col-sm-4 col-sm-offset-4">

        

        <form name="editcategory" action="{{ route('category.update',$Category->id) }}" method="POST" id="create-form" enctype="multipart/form-data">
          @csrf
          @method('put')
            <div class="form-group">
              <label for="categoryName">Category Name:</label>
              <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Product Name" value={{$Category->category_name}}>
              @error('category_name')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label for="categoryImage">Category Image:</label>
                <input type="file" class="form-control" id="category_imagename" name="category_imagename" >
                @error('category_imagename')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
              
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

       </div>
       </div>
   </div>
@endsection