
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="profile-image">
            <i class="fas fa-user"></i> 
            <!-- <img src="{{asset('images/faces/face5.jpg')}}" alt="image"/> -->
            </div>
            <div class="profile-name">
            <p class="name">
                Welcome {{ Auth::user()->name }} 
            </p>
            <p class="designation">
            {{ Auth::user()->type }}
            </p>
            </div>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/user/realestate/home">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="fa fa-phone menu-icon"></i>
              <span class="menu-title">Call customer</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/call">Add Call</a></li> 
                <li class="nav-item"><a class="nav-link" href="">Call Back</a></li>               
                <li class="nav-item"><a class="nav-link" href="">All Called Customer</a></li>
                <li class="nav-item"><a class="nav-link" href="">Add Customer</a></li>
              </ul>
            </div>
          </li>
        
        <li class="nav-item">
        <a class="nav-link" href="">
             <i class="far fa-handshake" aria-hidden="true"></i>
            <span class="menu-title" style="margin-left: 23px;"> Meeting</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-pen-square menu-icon"></i>
            <span class="menu-title" style="margin-left:2px;">Follow up</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fa  fa-envelope menu-icon"></i>
            <span class="menu-title" style="margin-left:2px;">Email</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
             <i class="far fa-comments menu-icon" ></i>
            <span class="menu-title">Whats'App</span>
        </a>
        </li>
       
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="far fa-comments menu-icon"></i>
            <span class="menu-title">Leads generation</span>
        </a>
        </li>
    </ul>
</nav>
      <!-- partial -->