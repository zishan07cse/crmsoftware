<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Realestate | Dashboard</title>
  <link  href="{{ asset('vendors/iconfonts/font-awesome/css/allin.css') }}" rel="stylesheet" type="text/css" >      
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css')}}">
  <link  rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.cs')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  
  <!-- @include('user.styles') -->
</head>
<body>
<div class="container-scroller">
    
@include('realestate.layouts.header')
<div class="container-fluid page-body-wrapper">
  @include('realestate.layouts.rightsidebar')
   @include('realestate.layouts.leftsidebar')
   @yield('content')
</div>

  
  
</div>     
<script src="{{ asset('vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{ asset('vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{ asset('js/off-canvas.js')}}"></script>
<script src="{{ asset('js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('js/misc.js')}}"></script>
<script src="{{ asset('js/settings.js')}}"></script>
<script src="{{ asset('js/todolist.js')}}"></script>
<script src="{{ asset('js/dashboard.js')}}"></script>
<!-- @include('user.scripts')  -->
</body>
</html>