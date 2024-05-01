{{-- <div>
    <!-- Be present above all else. - Naval Ravikant -->
</div> --}}

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>


        <li class="nav-item active">
            <a class="nav-link collapsed" data-toggle="collapse" href="#attendence" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Attendance</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="attendence" style="">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.attendence') }}">Add
                            attendence</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('attendence.index') }}">Attendence
                            List</a></li>

                </ul>
            </div>
        </li>




    </ul>
</nav>

