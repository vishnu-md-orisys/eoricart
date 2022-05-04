<?php
use App\Http\Controllers\ProductController;
$total=ProductController::cartitem();
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/" style="color:orange">eOriCart</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
          @if(auth()->user()->role_id == config('constants.ROLES.ADMIN'))
          <ul class="nav navbar-nav">
          <li class="active"><a href="{{route('product.index')}}">Products</a></li>
          <li class=""><a href="{{route('category.index')}}">Categories</a></li>
        </ul>
          @endif
          @if(auth()->user()->role_id == config('constants.ROLES.CUSTOMER'))
          <ul class="nav navbar-nav">
          <li class=""><a href="{{route('users.index')}}">Home</a></li>
          <li class=""><a href="#">Orders</a></li>
          </ul>
         <form class="navbar-form navbar-left" action="#">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
          @endif
        
        <ul class="nav navbar-nav navbar-right">
          @if (Route::has('login'))
                    @auth
                     <li>   <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a></li>
                    @else
                      <li>  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                        @if (Route::has('register'))
                          <li>  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                        @endif
                    @endauth
            @endif
          <li>
                        Welcome!<br> {{ Auth::user()->name }}
                             
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                    </a>
                    </form>
                    <li><a href="#">cart({{$total}})</a></li>   
                    </div></li>
                
              
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>