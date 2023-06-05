<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Dashboard</title>
  <link  href="{{ asset('vendors/iconfonts/font-awesome/css/allin.css') }}" rel="stylesheet" type="text/css" >      
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css')}}">
  <link  rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.cs')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  
  <!-- @include('user.styles') -->
</head>
<body>
<div class="container-scroller">
    
@include('admin.layouts.header')
<div class="container-fluid page-body-wrapper">
  <div class="theme-setting-wrapper">
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close fa fa-times"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles primary"></div>
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
      </div>
    </div>
  </div> 
  @include('admin.layouts.rightsidebar')
   @include('admin.layouts.leftsidebar')
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