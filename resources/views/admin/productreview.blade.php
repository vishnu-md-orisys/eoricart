@extends('admin.adminwelcome')
@section('admin.productreview')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
   <h1> Product Review</h1>
    @foreach($products as $product)
    <div class="row searched-item cart-list-div">
        <div class="col-sm-3">
        <img src="{{ url('images/'.(($product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px";>
            </div>
        <div class="col-sm-4">
            <div class="">
                <h2>{{$product->product_name}}</h2>
                <h5>{{$product->product_description}}. &#x20b9;{{$product->product_price}}</h5>
                <div class="container ">
                <form action="{{ url('rating/'.$product->id) }}" method="post" >
                @csrf
                @method('post')
                    <input type="radio" id="rate-5" name="rating" value="5" />
                    <label for="rate-5" class="fas fa-star">5 star</label>
                    <input type="radio" id="rate-4" name="rating" value="4" />
                    <label for="rate-4" class="fas fa-star">4 star</label>
                    <input type="radio" id="rate-3" name="rating" value="3" />
                    <label for="rate-3" class="fas fa-star">3 star </label>
                    <input type="radio" id="rate-2" name="rating" value="2" />
                    <label for="rate-2" class="fas fa-star">2 star</label>
                    <input type="radio" id="rate-1" name="rating" value="1" />
                    <label for="rate-1" class="fas fa-star">1 star</label><br>
                    <div class="form-group">
                    <label>Comments</label><br>
                    <textarea style="width:50% ;" name="review"></textarea><br>
                    @error('review')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
              </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                </div>
                </div>
                </div>
                
    </div>
            </div>

                </div>
               
    </div>
    @endforeach
</div>
</div></div>
@endsection