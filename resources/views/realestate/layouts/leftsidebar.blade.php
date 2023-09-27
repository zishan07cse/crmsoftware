<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
    type='text/css'>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <i class="fas fa-user"></i>
                    <!-- <img src="{{ asset('images/faces/face5.jpg') }}" alt="image"/> -->
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
            <a class="nav-link" data-toggle="collapse" href="#call" aria-expanded="false" aria-controls="call">
                <i class="fa fa-phone menu-icon"></i>
                <span class="menu-title">Call customer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="call">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/call">Add Call</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/callback">All
                            Callback</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/wrongnumber">All
                            Wrong Number</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/notanswered">All
                            Not Answered</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/busy">All
                            Busy</a></li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/disconneted">All
                            Disconnected</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#addcustomer" aria-expanded="false"
                aria-controls="addcustomer">
                <i class='fas fa-user-plus'></i>
                <span class="menu-title" style="margin-left: 23px;"> Add Customer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="addcustomer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/addcustomer">
                            Add New Customer</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/allnewcustomerlist">
                            All Added Customer</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#meeting" aria-expanded="false" aria-controls="meeting">
                <i class="far fa-handshake" aria-hidden="true"></i>
                <span class="menu-title" style="margin-left: 23px;"> Meeting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="meeting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/upcomingmeeting">Upcoming
                            Meeting</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/previousmeeting">
                            Previous Meeting</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#followup" aria-expanded="false" aria-controls="followup">
                <i class="fas fa-pen-square menu-icon"></i>
                <span class="menu-title"> Followup</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="followup">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link"
                            href="/user/realestate/customer/upcomingpfollowup">Upcoming
                            Followup</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/user/realestate/customer/previousfollowup">
                            Previous Followup</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/realestate/customer/allleads">
                <i class='fas fa-users'></i>
                <span class="menu-title" style="margin-left: 23px;">All Leads</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/realestate/customer/sellslist">
                <i class="fa fa-money"></i>
                <span class="menu-title" style="margin-left: 23px;">All Sells</span>
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->
