<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        @auth
        @isset(Auth::user()->profile->image)
        <div class="avatar"><img src="{{ asset(Auth::user()->profile->image)}}" alt="User Name"
                class="img-fluid rounded-circle" width="150" height="150">
        </div>
        @endisset
        <div class="title">
            <h1 class="h4">{{Auth::user()->name}}</h1>
        </div>
        @endauth

        <div class="">

        </div>
    </div>

    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul>
        <li><a href="#">Home</a></li>


        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-truck"
                    aria-hidden="true"></i> Trucks
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Truck</a>
                </li>
                <li><a href="#">Truck Model</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
