
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
        <a class="nav-link" href="index-2.html">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fa fa-phone menu-icon"></i>
            <span class="menu-title">Call customer</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
             <i class="far fa fa-id-badge"></i>
         
            <span class="menu-title" style="margin-left: 29px;">Call back</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
             <i class="far fa-handshake" aria-hidden="true"></i>
            <span class="menu-title" style="margin-left: 26px;"> Meeting</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-pen-square menu-icon"></i>
            <span class="menu-title">Follow up</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fa  fa-envelope menu-icon"></i>
            <span class="menu-title" margin-left: 6px;>Email</span>
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