@extends('layouts.admin-master')

@section('title', 'Admin department-'.$course->name)

@section('content')

<div id="page-wrapper">
        <h3 class="panel-title text-center"><i class="fa fa-star"></i> {{$course->code or ''}} </h3>
        <div class="panel panel-primary"></div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        
            <h5>Course: <i>{{$course->code or ''}} ({{$course->title or ''}})</i></h5>

            <h5>Department: <i>{{$course->department->name or 'N/A'}}</i></h5>

            <h5>Semester <i>:{{$course->semester->name or ''}}</i> </h5>

            <h5>Level :<i>{{$course->level->name or ''}}</i> </h5>

            <h5>Cordinator :<i>{{$course->user->name or 'N/A'}}</i> </h5>

            <h5>Type :<i>@if($course->type==0)ppt @else cbt @endif</i> </h5>

            <h5>Unit :<i>{{$course->unit or ''}}</i> </h5>

            <a href="/admin/courses/{{$course->slug or ''}}/edit">Edit</a>

            <div class="panel panel-primary"></div>

            @if(count($years)>0)
            <div class="list-group">
                <h4><div style="text-align: center;"> {{$course->code or ''}} and sessions.</div></h4>
                @foreach($years as $year)
                <a href="/admin/questions/{{$course->slug or ''}}/{{$year->slug or ''}}" class="list-group-item" >
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
    <a href="{{URL::to('/admin/courses')}}" class="btn btn-success btn-sm back-button"><i class="fa fa-arrow-left"></i> Back to courses</a>
</div>


@endsection
