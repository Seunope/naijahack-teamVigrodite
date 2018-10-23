@extends('layouts.admin-master')

@section('title', 'Admin department details page')

@section('content')

    <div id="page-wrapper">
        <!-- <div class="panel panel-primary"></div> -->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5><strong>Course code</strong>: <i>{{$course->code or ''}} ({{$course->title or ''}})</i></h5>

                <h5>Department: <i>{{$course->department->name or 'N/A'}}</i></h5>

                <h5>Semester <i>:{{$course->semester->name or ''}}</i> </h5>

                <h5>Level :<i>{{$course->level->name or ''}}</i> </h5>

                <h5>Cordinator :<i>{{$course->user->name or 'N/A'}}</i> </h5>

                <h5>Type :<i>@if($course->type==0)ppt @else cbt @endif</i> </h5>

                <h5>Unit :<i>{{$course->unit or ''}}</i> </h5>

                <a href="/departmentAdmin/courses/{{$course->slug}}/edit">Edit</a>

                <h3>Years/Sessions</h3>
                <div class="panel panel-primary"></div>
                @if(count($years)>0)
                    <div class="list-group">
                        <h4><div style="text-align: center;"> {{$course->code or ''}} and sessions.</div></h4>
                        @foreach($years as $year)
                            <a href="/admin/questions/{{$course->slug or ''}}/{{$year->slug or ''}}" class="list-group-item">
                                {{$course->code or ''}}-  {{$year->name or ''}}
                                <span class="pull-right">{{count(DB::table('questions')->where('year_id', $year->id)->where('course_id', $course->id)->get())}} Questions</span>
                            </a>
                        @endforeach
                    </div>
                @else

                @endif

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>


@endsection
