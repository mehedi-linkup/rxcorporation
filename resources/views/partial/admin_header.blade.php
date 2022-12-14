 <!-- Top Bar Start -->
 <div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{route('dashboard')}}" class="logo">
           <img src="{{asset($content->logo)}}" alt="" class="company-logo">
        </a>
    </div>

    <nav class="navbar-custom">

        <ul class="navbar-right d-flex list-inline float-right mb-0">
           
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset(Auth::user()->image)}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('auth.profile.edit')}}"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('logout')}}" onclick="return confirm('Are you sure ! Logout from Admin Panel')"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>                                                                    
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect waves-light">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>                        
           
        </ul>

    </nav>

</div>
<!-- Top Bar End -->