
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="profile-image">
            <i class="fas fa-user"></i> 
            </div>
            <div class="profile-name">
            <p class="name">
               {{ auth()->user()->name}}
            </p>
            <p class="designation">
               {{ Auth::user()->type }}
            </p>
            </div>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/home">
            <i class="fa fa-home menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/userlist">
            <i class="fa  fa-user-friends menu-icon"></i>
            <span class="menu-title">User List</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/create">
            <i class="fa  fa-user-plus menu-icon"></i>
            <span class="menu-title">Create User</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="fa  fa-envelope menu-icon"></i>
            <span class="menu-title">Email</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="far fa-comments menu-icon" ></i>
            <span class="menu-title">Whats'App</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="fa fa-first-order menu-icon"></i>
            <span class="menu-title">Leads</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="fa fa-envelope menu-icon"></i>
            <span class="menu-title">Total Calls</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="fa fa-handshake-o menu-icon"></i>
            <span class="menu-title">Meeting</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/admin/user/ed">
            <i class="far fa-money menu-icon"></i>
            <span class="menu-title">Check Received</span>
        </a>
        </li>
    </ul>
</nav>
      <!-- partial -->