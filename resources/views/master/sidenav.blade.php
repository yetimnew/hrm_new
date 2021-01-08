<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        {{-- @auth
        @isset(Auth::user()->profile->image)
        <div class="avatar"><img src="{{ asset(Auth::user()->profile->image)}}" alt="User Name"
                class="img-fluid rounded-circle" width="150" height="150">
        </div>
        @endisset
        <div class="title">
            <h1 class="h4">{{Auth::user()->name}}</h1>
        </div>
        @endauth --}}

        <div class="">

        </div>
    </div>

    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul>
        {{-- <li><a href="#">Maintenance</a></li>

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
        <li><a href="{{ route('open_job_card.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> Open Job
                Card</a>
        </li> --}}


        <span class="heading">HRM</span>
        <li><a href="{{ route('personale.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> ሰራተኛ </a>
        </li>
        <li><a href="{{ route('department.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> የስራ ክፍል
            </a>
        </li>
        <li><a href="{{ route('branch.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> ቅርንጫፍ</a></li>
        <li><a href="{{ route('pay_grade.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i>ደረጃ</a>
        </li>
        <li><a href="{{ route('pay_grade_level.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> እርከን</a>
        </li>
        <li><a href="{{ route('job_title.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> የስራ መደብ</a>
        </li>
        <li><a href="{{ route('promotion.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> ዕድገት </a>
        </li>
        <li><a href="{{ route('leave_type.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> የፍቃድ ዓይነት </a>
        </li>
        <li><a href="{{ route('leave_period.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> በጀት ዓመት </a>
        <li><a href="{{ route('leave_entitlement.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i>ፍቃድ መሙያ </a>
        <li><a href="{{ route('leave.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i>ፍቃድ </a>
        <li><a href="{{ route('holiday.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i>በዓል </a>
        </li>
        <li><a href="{{ route('work_week.index')}}"> <i class="fas fa-stopwatch" aria-hidden="true"></i> የሥራ ቀናት </a>
        </li>
        </li>
    </ul>
</nav>
