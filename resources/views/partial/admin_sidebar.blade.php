<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="fas fa-home"></i> <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fab fa-product-hunt"></i><span> Product <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{route('category.index')}}">Category</a></li>
                        <li><a href="{{route('product.index')}}">Product</a></li>
                    </ul>
                </li>
              
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-book"></i><span> Website Content <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{route('gallery.index')}}">Gallery</a></li>
                        <li><a href="{{route('service.index')}}">Service</a></li>
                        <li><a href="{{route('counter.index')}}">Counter</a></li>
                        <li><a href="{{route('partner.index')}}">Partner</a></li>
                        <li><a href="{{route('management.index')}}">Management</a></li>
                        <li><a href="{{route('team.index')}}">Team</a></li>
                        <li><a href="{{route('slider.index')}}">Slider</a></li>
                        <li><a href="{{route('specialize.index')}}">Specialize</a></li>
                    </ul>
                </li>
               
                <li>
                    <a href="{{route('post.index')}}" class="waves-effect"><i class="fas fa-newspaper"></i><span>Post </span></a>
                    
                </li>
                <li>
                    <a href="{{route('contact.list')}}" class="waves-effect"><i class="fas fa-address-book"></i><span> Message From Website</span></a>
                   
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-wrench"></i><span> Setting <span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="{{route('company.profile')}}">Company Profile</a></li>
                        <li><a href="{{route('about.us.edit')}}">About Us</a></li>
                        <li><a href="{{route('user.index')}}"> User List</a></li>
                        <li><a href="{{route('user.create')}}"> User Create</a></li>
                        <li><a href="{{route('auth.profile.edit')}}">Update Profile</a></li>
                        <li><a href="{{route('password.change')}}">Change Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('logout')}}" onclick="return confirm('Are you sure ! Logout from Admin Panel')" class="waves-effect"><i class="fas fa-sign-out-alt"></i><span>Log Out </span></a>
                    
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->