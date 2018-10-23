<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/management">{{Auth::user()->role->title}} Panel</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav black-color">
            @if(Auth::user()->role->id==1)
            <li class="active"><a href="{{URL::to('/management')}}"><i class="fa fa-apple"></i> Dashboard</a></li>
            <li><a href="{{URL::to('/admin/schools')}}"><span class="glyphicon glyphicon-education"></span> Schools</a></li>
            <li><a href="{{URL::to('/admin/users')}}"><span class="glyphicon glyphicon-user"></span> Students</a></li>
            <li><a href="{{URL::to('/admin/faculties')}}"><i class="fa fa-suitcase"></i> Faculties</a></li>
            <li><a href="{{URL::to('/admin/departments')}}"><i class="fa fa-desktop"></i> Departments</a></li>
            <li><a href="{{URL::to('/admin/courses')}}"><i class="fa fa-book"></i> Courses</a></li>
            <li><a href="{{URL::to('/admin/suggestions')}}"><i class="fa fa-book"></i> Suggestions</a></li>
            <li><a href="{{URL::to('/admin/testimonies')}}"><i class="fa fa-book"></i> Testimonies</a></li>
            {{--{{ Request::is('about*') ? ' class="active"' : null }}>--}}
            {{--<li><a href="{{URL::to('/admin/questions')}}"><i class="fa fa-tasks"></i> Questions</a></li>--}}
            {{--                <li><a href="{{URL::to('/admin/roles')}}"><i class="fa fa-tasks"></i> Roles</a></li>--}}
            {{--                <li><a href="{{URL::to('/admin/years')}}"><i class="fa fa-tasks"></i> Sessions</a></li>--}}
            {{--                <li><a href="{{URL::to('/admin/levels')}}"><span class="glyphicon glyphicon-stats"></span>Levels</a></li>--}}
            {{--<li><a href="{{URL::to('/admin/semesters')}}"><span class="glyphicon glyphicon-cloud"></span>Semesters</a></li>--}}
            @endif
            @if(Auth::user()->role->id==2)
            <li class="{{Request::path() == 'land'? 'active' : ''}}"><a href="{{URL::to('/management')}}"><i class="fa fa-apple"></i>Dashboard</a></li>
            <li class="{{Request::path() == 'schoolAdmin/faculties'? 'active' : ''}}"><a href="{{URL::to('/schoolAdmin/faculties')}}" class="@if(isset($departments)) active @endif"><i class="fa fa-suitcase"></i> Faculties</a></li>
            <li class="{{Request::path() == 'schoolAdmin/departments'? 'active' : ''}}"><a href="{{URL::to('/schoolAdmin/departments')}} " class="@if(isset($departments)) active @endif"><i class="fa fa-desktop"></i> Departments</a></li>
            <li class="{{Request::path() == 'schoolAdmin/courses'? 'active' : ''}}"><a href="{{URL::to('/schoolAdmin/courses')}}"><i class="fa fa-book"></i> Courses</a></li>
            @endif
            @if(Auth::user()->role->id==3)
            <li class="active"><a href="{{URL::to('/departmentAdmin/department')}} " class="@if(isset($departments)) active @endif"><i class="fa fa-desktop"></i> My Department</a></li>
            <li><a href="{{URL::to('/departmentAdmin/courses')}}"><i class="fa fa-book"></i> Courses</a></li>
            {{--            <!-- <li><a href="{{URL::to('/schoolAdmin/questions')}}"><i class="fa fa-tasks"></i> Questions</a></li> -->--}}
            @endif
            @if(Auth::user()->role->id==4)
            <li class="active"><a href="{{URL::to('/courseAdmin/courses')}} " class="@if(isset($courses)) active @endif"><i class="fa fa-desktop"></i> My Courses</a></li>
            {{--<li><a href="{{URL::to('/courseAdmin/courses')}}"><i class="fa fa-book"></i> Courses</a></li>--}}
            {{--            <!-- <li><a href="{{URL::to('/schoolAdmin/questions')}}"><i class="fa fa-tasks"></i> Questions</a></li> -->--}}
            @endif
            @if(Auth::user()->role->id<5)
            <li><a href="{{URL::to('/mailIndex')}}"><span class="glyphicon glyphicon-envelope"></span> Mails</a></li>
            @endif
        </ul>
        <ul class="nav navbar-nav navbar-right navbar-user">
            <!-- <li class="dropdown messages-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header">2 New Messages</li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><i class="fa fa-bell"></i></span>
                            <span class="message">Security alert</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><i class="fa fa-bell"></i></span>
                            <span class="message">Security alert</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                </ul>
            </li> -->
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="/"><i class="fa fa-user"></i> Users Home page</a></li>
                    <li><a href="/home/{{Auth::user()->level->slug}}"><i class="fa fa-book"></i> My courses page</a></li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>