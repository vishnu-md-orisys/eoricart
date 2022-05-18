@extends('admin.adminwelcome')
@section('admin.productdetails')
<div class="container custom-product"> 
    <table>
        @foreach ($products as $Product)
        <a href="/productdetails/{$Product->id}">
      <tr>
          <td><img src="{{ url('images/'.(($Product->product_images)[0])->product_imagename) }}" style="width:200px; height:150px;" alt="" ></td>
          </tr>
      <tr>
      <td ><h3><span style=" font-weight:bold;color:rgb(82, 92, 44);"><i>{{ $Product->product_name }}<i></span></h3> </td>
      </tr>
      <tr></a>
      <td>Product Details:{{$Product->product_description }}</td>
      </tr>
      <tr>
          <td>Price: &#x20b9;{{$Product->product_price }}</td>
          </tr>
          <?php $trating= 0; 
          $tot=0;?>
          <tr>
            <td> Rating: 
              @foreach ($Product->customer_reviews as $review)
            <?php  $trating = $trating + $review->rating; 
            $tot = $tot +1;
            ?>
              @endforeach
              {{$trating/$tot}}/5(by {{$tot}} customers)
            </td>
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
     <tr>
          <td><h2 style="color: rgb(88, 135, 175);">Customer Reviews</h2></td></tr>
        
        @foreach ($Product->customer_reviews as $review)
        <tr> <td> <h4 style="font-family:   Geneva, Verdana, sans-serif">  {{$review->user->name }} </h4><td></tr><br>
     <tr> <td>  Rating: {{$review->rating }} <td></tr><br>
        <tr><td> <textarea disabled style="width:400px; height:auto; resize: none;"> {{$review->review }}</textarea></td></tr><br>
        @endforeach
      
      @endforeach
      </table>
</div>
@endsection