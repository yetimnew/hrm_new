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
        <li><a href="#">Maintenance</a></li>

        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-truck"
                    aria-hidden="true"></i> Trucks
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="#">Truck</a>
                </li>
                <li><a href="#">Truck Model</a>
                </li>
            </ul>
        </li>
        <li><a class="{{ Request::is('downtime.index') ? 'active' : ''}}" href=" {{ route('downtime.index')}}"> <i
                    class="fas fa-stopwatch" aria-hidden="true"></i> Down Time</a>
        </li>
        <li><a href="{{ route('job_card_type.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Job Card
                Type</a>
        </li>
        <li><a href="{{ route('job_ident.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Job Ident</a>
        </li>
        <li><a href="{{ route('job_system.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Job System</a>
        </li>
        <li><a href="{{ route('job_type.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Job Type</a>
        </li>


        <span class="heading">HRM</span>
        <li><a href="{{ route('personale.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Personale </a>
        <li><a href="{{ route('department.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Department
            </a>
        </li>
    </ul>
</nav>
