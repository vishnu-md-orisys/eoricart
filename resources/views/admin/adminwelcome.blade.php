<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eOricart</title>
    <link rel="stylesheet" type="text/css" href="#" >
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    {{ View::make('admin.adminheader') }}
    <div style="margin-top:70px;">
        @yield('admin.content')
    @yield('admin.dashboard')
    @yield('admin.deliveryaddress')
    @yield('admin.productlist')
    @yield('admin.productform')
    @yield('admin.editproduct')
    @yield('admin.categorylist')
    @yield('admin.categoryform')
    @yield('admin.editcategory')
    @yield('admin.userhome')
    @yield('admin.mycart')
    @yield('admin.ordernow')
    @yield('admin.deliveryaddress')
    </div>
</body>
<style>
    .custom-login{
        height: 500px;
        padding-top:100px;
    }
    .cart-list-div{
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    .search-box{
        width:500px !important;
    }
    </style>
</html>