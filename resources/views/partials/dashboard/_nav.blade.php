<style type="text/css">
    .navbar-header {
    background: #5e0000;
}

#side-menu>li>a.active {
    border-left: 3px solid #5e0000;
    color: #ffffff;
    font-weight: 500;
}
.sidebar-nav  {
    background: #5e0000;

}
.fa  {
    color: white;
}

</style>
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="#">
                <b><img src="{{ asset('/plugins/images/pixeladmin-logo.png') }}" alt="home"/></b>
                <small class="hidden-xs">School<b> Portal</b></small>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right pull-right">
            @if(Auth::user())
            <li>
                <a class="profile-pic" href="#">
                    <img src="{{ asset('') . auth()->user()->picture }}" alt="user-img" width="36" class="img-circle">
                    <b class="hidden-xs">{{ auth()->user()->first_name }}</b>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            @if(Auth::user())
            <li style="padding: 10px 0 0;">
                <a href="{{ route('get.home') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            @if(auth()->user()->hasRole(['Super Admin','Admission Staff']))
            <li>
                <a href="{{ route('get.admission') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Admission</span></a>
            </li>
            @endif
            @if(auth()->user()->hasRole(['Registrar Staff','Super Admin']))
            <li>
                <a href="{{ route('get.schedules') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
            </li>
            <li>
                <a href="{{ route('get.enrollment') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Enrollment</span></a>
            </li>
            <li>
                <a href="{{ route('get.request-forms') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Request Forms</span></a>
            </li>
            @endif
            @if(auth()->user()->hasRole(['Guidance Staff','Super Admin']))
            <li>
                <a href="{{ route('incident-report.index') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Guidance</span></a>
            </li>
            @endif
            @if(auth()->user()->hasRole(['Clinic Staff','Super Admin']))
            <li>
                <a href="{{ route('clinic.index') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Clinic</span></a>
            </li>
            @endif
            @if(auth()->user()->hasRole(['Faculty']))


                     <li>
                <a href="{{ route('clinic.files') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Files</span></a>
            </li>
            <li>
                <a href="{{ route('teacher.sections') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Grades</span></a>
            </li>
            <li>
                <a href="{{ route('teacher.schedule') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
            </li>
            @endif

            @if(auth()->user()->hasRole('Student'))
            <li>
                <a href="{{ route('student.schedules') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Schedules</span></a>
            </li>
             <li>
                <a href="{{ route('student.grades') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Grades</span></a>
            </li>
            <li>
                <a href="{{ route('student.fuckshit') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Request Form</span></a>
            </li>

                        <li>
                <a href="{{ route('get.profile') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
            </li>
{{--

                        <li>
                <a href="{{ route('student.asd') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Non-acad</span></a>
            </li> --}}
            @endif


            @if(auth()->user()->hasRole('Super Admin'))
            <li>
                <a href="{{ route('get.user-management') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">User Management</span></a>
            </li>
            @endif
            <li>
                <a href="#" onclick="document.getElementById('form-logout').submit();"  class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
            </li>
            @endif
            @if(Auth::guest())
            <li style="padding: 10px 0 0;">
                <a href="{{ route('get.login') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Login</span></a>
            </li>
            <li>
                <a href="{{ route('get.student-application') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Student Application</span></a>
            </li>
                 <li>
                <a href="{{ route('student.fuckshit') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Request Form</span></a>
            </li>
            @endif
        </ul>
        @if(Auth::user())
        <form id="form-logout" method="POST" action="{{ route('post.logout') }}">
            {{ csrf_field() }}
        </form>
        @endif
    </div>
</div>
