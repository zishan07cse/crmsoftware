 <link rel="stylesheet" href="{{ asset('/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css') }}">
 <style>
     @media (max-width:360px) .navbar.default-layout-navbar .navbar-menu-wrapper {
         width: 210px;
     }
 </style>
 <!-- partial:partials/_navbar.html -->
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <a class="navbar-brand brand-logo" href="/user/realestate/home"><img
                 src="{{ asset('/images/st_admin_logo1.png') }}" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/user/realestate/home"><img
                 src="{{ asset('/images/st_admin_logo1.png') }}" alt="logo"/></a>

     </div>
     <div class="navbar-menu-wrapper d-flex align-items-stretch">
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="fas fa-bars"></span>
         </button>
         <ul class="navbar-nav navbar-nav-right">
             <a href="/user/realestate/customer/callback">
                 <li class="nav-item dropdown">   
                     <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href=""
                         data-toggle="dropdown" aria-expanded="false">
                         <div class="preview"> <i class="icon-call-in"></i></div>
                         <span class="count"> @php echo sizeof($callbacklist); @endphp</span>
                     </a>
                      <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">@php echo "You have ". sizeof($callbacklist).  
                        " call back pending" @endphp
                        </p>
                        <span class="badge badge-pill badge-warning float-right" href="javascript:void(0);" onclick="gotocallBack();">
                        View all</span>
                        </a>
                     </div>   
                 </li>
             </a>
             <li class="nav-item nav-profile dropdown">
                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                     <i class="fas fa-user"></i>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
        
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-toggle="offcanvas">
             <span class="fas fa-bars"></span>
         </button>
     </div>
 </nav>
 <script>
   function gotocallBack(){
        window.location.href = '/user/realestate/customer/callback';
   }
 </script>
 <!-- partial -->
