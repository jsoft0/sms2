<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Class</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.class') }}">Add Class</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('class.list') }}">Class List</a></li>
                </ul>
            </div>

        </li>


        <li class="nav-item active">
            <a class="nav-link collapsed" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Teacher</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements" style="">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('teacher.create') }}">Add Teacher</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('teacher.index') }}">Teacher List</a></li>

                </ul>
            </div>
        </li>


        <li class="nav-item active">
            <a class="nav-link collapsed" data-toggle="collapse" href="#student" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Students</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="student" style="">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.students') }}">Add Student</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('teacher.index') }}">Student List</a></li>

                </ul>
            </div>
        </li>



        <li class="nav-item active">
            <a class="nav-link collapsed" data-toggle="collapse" href="#subject" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Subjects</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subject" style="">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.subjects') }}">Add Subject</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('subject.index') }}">Subject List</a></li>

                </ul>
            </div>
        </li>


        <li class="nav-item active">
            <a class="nav-link collapsed" data-toggle="collapse" href="#attendence" aria-expanded="false"
                aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Attendence</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="attendence" style="">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item"> <a class="nav-link" href="{{ route('add.attendence') }}">Add attendence</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('attendence.index') }}">Attendence List</a></li>

                </ul>
            </div>
        </li>




    </ul>
</nav>
