@extends('admin.adminwelcome')
@section('admin.mycart')
<h1>MyCart page</h1>
<div class="container">
<table>
@foreach ($carts as $Cart)
<tr>
    <td><img src="{{ asset($Category->category_imagename) }}" style="width:200px; height:150px;" alt="" ></td>
    </tr>
<tr>
<td style=" font-weight:bold;color:rgb(141, 179, 7);"><h2>{{ $Category->category_name }}</h2> </td>
</tr>
<tr>
<td>
<form action="{{ route('cart_item.destroy',$Cart->id) }}" method="Post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Remove From Cart</button>
</form>
</td>
</tr>
</div>
@endforeach
</table>
{!! $carts->links() !!}
@endsection