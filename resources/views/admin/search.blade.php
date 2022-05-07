@extends('admin.adminwelcome')
@section('admin.content')
<div class="container custom-product"> 
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
<button type="submit" class="btn btn-danger" onclick="return confirm('Adding to cart')">Add to Cart</button>
</form>
</td>
</tr>
@endforeach
</table>
</div>
@endsection