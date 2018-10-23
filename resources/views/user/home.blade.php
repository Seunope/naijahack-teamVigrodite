@extends('layouts.user-master')

@if(Auth::check() && isset(Auth::user()->department))
    @section('title',   Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
@section('description', Auth::user()->school->name.' '.Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
@section('keywords', Auth::user()->school->name, Auth::user()->department->name,Auth::user()->level->name, Auth::user()->school->name.' '.Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
@else
    @section('title',   'Courses in my department')
@endif
@section('content')

    <!-- content inside wrapper begins -->
    <div class="section section-padding news-detail small-padding top-20">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div class="group-title-index">
                            <h2 class="center-title"> {{Auth::user()->department? Auth::user()->department->name : ''}} {{Auth::user()? Auth::user()->level->name: ''}} COURSES </h2>

                            {{--<div class="bottom-title"><i class="bottom-icon icon-icon-04"></i></div>--}}
                        </div>
                        <hr>
                        <div class="news-detail">
                            @if($courses)
                                <div class="section choose-course-3" style="margin: 60px 0px 30px 0px;">
                                    @foreach($courses as $course)
                                        <div class="group-title-index">
                                            <h2 class="center-title"><a class="title-course" href="/course/{{$course->slug or ''}}"> {{$course->code or ''}} </a> </h2>
                                            <h4 class="top-title"><a class="title-course" href="/course/{{$course->slug or ''}}">{{$course->title or ''}} </a></h4>
                                            {{--<div class="bottom-title"><i class="bottom-icon icon-icon-04"></i></div>--}}
                                        </div>
                                        <div class="choose-course-3-wrapper row">
                                            @if($years)
                                                @foreach($years as $year)
                                                    <div class="item-course" style="height: 100%">
                                                        <a href="/general/questions/{{$course->slug or ''}}/{{$year->slug or ''}}/Exam">
                                                            <div class="item-course-wrapper" style="padding-top: 8%;padding-bottom: 8%;">
                                                                <div class="icon-course course-year" style="display: block;">
                                                                    <p style="font-size: 41px" class="icons-img icon-globe">{{$year->name or ''}}</p>
                                                                </div>
                                                                <div class="info-course" style="display: block;padding-left: 0px;">
                                                                    <div class="info">
                                                                        <b style=" @if(count(DB::table('questions')->where('year_id', $year->id)->where('course_id', $course->id)->get())) color: red; @endif font-size: larger">
                                                                            {{count(DB::table('questions')->where('year_id', $year->id)->where('course_id', $course->id)->get())}}</b>
                                                                        questions uploaded.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                            @else
                                <div style="text-align: center;"><div class="warning">Please be patience we are uploading for this course or choose a valid deepartment</div></div>
                            @endif
                        </div>
                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection