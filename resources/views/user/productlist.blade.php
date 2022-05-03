@extends('admin.adminwelcome')
@section('admin.productlist')
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{route('product.create')}}"> Add product</a>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
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
<form action="{{ route('product.destroy',$Product->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('product.edit',$Product->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
@endsection