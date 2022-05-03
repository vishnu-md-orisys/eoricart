@extends('admin.adminwelcome')
@section('admin.categorylist')
<div class="pull-right mb-2">
    <a class="btn btn-success" href="{{route('category.create')}}"> Add category</a>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table>
@foreach ($categories as $Category)
<tr>
    <td><img src="{{ asset($Category->category_imagename) }}" style="width:200px; height:150px;" alt="" ></td>
    </tr>
<tr>
<td style=" font-weight:bold;color:rgb(141, 179, 7);"><h2>{{ $Category->category_name }}</h2> </td>
</tr>
<td>
<form action="{{ route('category.destroy',$Category->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('category.edit',$Category->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $categories->links() !!}
@endsection