@extends('admin.adminwelcome')
@section('admin.userhome')
<div class="container custom-product">

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>eOriCart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  
  <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      @foreach ($products as $Product)
      <div class="carousel-inner">
       
          <div class="">
          <img src="{{ url('images/'.(($Product->product_images)[0])->product_imagename) }}"  alt="" style="">
          <div class="carousel-caption">
            <h3 style="color: rgb(236, 201, 152)">{{ $Product->product_name }}</h3>
            <p style="color: rgb(236, 201, 152)">{{$Product->product_description }}</p>
          </div>
        </div>  
   
      </div>
      @endforeach 
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  
  </body>
  </html>
  
<table>
  @foreach ($products as $Product)
<tr>
    <td><img src="{{ url('images/'.(($Product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px;" alt="" ></td>
    </tr>
<tr>
<td ><h3><span style=" font-weight:bold;color:rgb(82, 92, 44);"><i>{{ $Product->product_name }}<i></span></h3> </td>
</tr>
<tr>
<td>Product Details:{{$Product->product_description }}</td>
</tr>
<tr>
    <td>Price: &#x20b9;{{$Product->product_price }}</td>
    </tr>
<td>
<form action="/add_to_cart" method="POST">
@csrf
@method('post')
<input type="hidden" id="product_id" name="product_id" value={{$Product->id }}>
<label for="quantity">Quantity</label>
<select name="quantity" id="quantity">
  <option selected hidden disabled>Choose quantity</option>
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
<button type="submit" class="btn btn-danger" onclick="return confirm('Adding to cart')">Add to Cart</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
</div>
@endsection