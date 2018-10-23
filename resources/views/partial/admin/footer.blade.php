<div class="footer-text pull-center">
<a href="javascript: history.go(-1)" class="button" style="text-decoration: none;">Go Back</a>
<br><br><br>

    @if(Auth::user()->role->id==1)
        <a href="{{URL::to('/management')}}"> Dashboard</a>
        <a href="{{URL::to('/admin/schools')}}"> Schools</a>
        <a href="{{URL::to('/admin/users')}}"> Students</a>
        <a href="{{URL::to('/admin/faculties')}}"> Faculties</a>
        <a href="{{URL::to('/admin/departments')}}"> Departments</a>
        <a href="{{URL::to('/admin/courses')}}"> Courses</a>
        {{--<a href="{{URL::to('/admin/questions')}}"><i class="fa fa-tasks"></i> Questions</a>--}}
        <a href="{{URL::to('/admin/roles')}}"> Roles</a>
        <a href="{{URL::to('/admin/years')}}"> Sessions</a>
        <a href="{{URL::to('/admin/levels')}}">Levels</a>
        {{--<a href="{{URL::to('/admin/semesters')}}"><span class="glyphicon glyphicon-cloud"></span>Semesters</a>--}}
    @endif
    @if(Auth::user()->role->id==2)
        <a href="{{URL::to('/management')}}"><i class="fa fa-apple"></i>Dashboard</a>
        <a href="{{URL::to('/schoolAdmin/faculties')}}" class="@if(isset($departments)) active @endif">Faculties</a>
        <a href="{{URL::to('/schoolAdmin/departments')}} " class="@if(isset($departments)) active @endif">Departments</a>
        <a href="{{URL::to('/schoolAdmin/courses')}}"> Courses</a>
    @endif
    @if(Auth::user()->role->id==3)
        <a href="{{URL::to('/departmentAdmin/department')}} " class="@if(isset($departments)) active @endif"> My Department</a>
        <a href="{{URL::to('/departmentAdmin/courses')}}"> Courses</a>
        {{--            <!-- <a href="{{URL::to('/schoolAdmin/questions')}}"><i class="fa fa-tasks"></i> Questions</a> -->--}}
    @endif
    @if(Auth::user()->role->id==4)
        <a href="{{URL::to('/courseAdmin/courses')}} " class="@if(isset($courses)) active @endif"> My Courses</a>
        {{--<a href="{{URL::to('/courseAdmin/courses')}}"><i class="fa fa-book"></i> Courses</a>--}}
        {{--            <!-- <a href="{{URL::to('/schoolAdmin/questions')}}"><i class="fa fa-tasks"></i> Questions</a> -->--}}
    @endif
    @if(Auth::user()->role->id<5)
        <a href="{{URL::to('/mails')}}">Mails</a>
    @endif
    <br>
All right reserved     &copy; 2017 sol.ng</div>

