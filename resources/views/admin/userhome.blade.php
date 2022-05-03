@extends('admin.adminwelcome')
@section('admin.userhome')
<div class="container custom-product">

    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        @foreach ($products as $Product)
        <div class="carousel-inner">
          <div class="item active">
            <img src="{{ url('images/'.(($Product->product_images)[0])->product_imagename) }}" alt="">
            <div class="carousel-caption">
                <h3><span style=" font-weight:bold;color:rgb(82, 92, 44);"><i>{{ $Product->product_name }}<i></span></h3> 
              <p>LA is always so much fun!</p>
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
      </div> --}}
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
<form action="#" method="POST">
@csrf
@method('post')
<button type="submit" class="btn btn-danger" onclick="return confirm('Adding to cart')">Add to Cart</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
</div>
@endsection