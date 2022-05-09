@extends('admin.adminwelcome')
@section('admin.adddresslist')
<div class="custom-product">
<div class="row-sm-4">
<div class="trending-wrapper">
    <h1>Choose your Location:</h1>
    @foreach($addresses as $address)
    <div class="row searched-item cart-list-div">
       
        <div class="col-sm-4">
            <div class="">
                <h5>{{$address->fullname}}</h5>
                <h5>{{$address->addressline1}}</h5>
                <h5>{{$address->addressline2}}</h5>
                <h5>{{$address->mobile}}</h5>
            </div>
                </div>
                    <form action="#" method="post">
                        @csrf
                        @method('post')
                   <button class="btn btn-warning">Add Address</button>
                    </form>
    </div>
    @endforeach
</div>
</div></div>
@endsection