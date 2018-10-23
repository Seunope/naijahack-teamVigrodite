@extends('layouts.user-master')

@section('title',   Auth::user()->department->name.' '.Auth::user()->level->name.' courses')
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
                            @if(!empty($courses))
                                <div class="section choose-course-3" style="margin: 60px 0px 30px 0px;">
                                    @foreach($courses as $course)
                                        <div class="group-title-index">
                                            <h2 class="center-title"><a class="title-course" href="/general/courses/{{$course->slug or ''}}"> {{$course->code or ''}} </a> </h2>
                                            <h4 class="top-title"><a class="title-course" href="/general/courses/{{$course->slug or ''}}">{{$course->title or ''}} </a></h4>
                                            {{--<div class="bottom-title"><i class="bottom-icon icon-icon-04"></i></div>--}}
                                        </div>
                                        <div class="choose-course-3-wrapper row">
                                            @if(!empty($years))
                                                @foreach($years as $year)
                                                    <div class="item-course" style="height: 100%">
                                                        <div class="item-course-wrapper" style="padding-top: 8%;padding-bottom: 8%;">
                                                            <div class="icon-course course-year" style="display: block;">
                                                                <a href="/general/questions/{{$course->slug or ''}}/{{$year->slug or ''}}/Exam" style="font-size: 41px" class="icons-img icon-globe">{{$year->name or ''}}</a>
                                                            </div>
                                                            <div class="info-course" style="display: block;padding-left: 0px;">
                                                                {{--<a href="/general/questions/{{$course->slug or ''}}/{{$year->year->slug or ''}}/Exam" class="name-course">{{$year->year->name or ''}}</a>--}}
                                                                <div class="info">Up to
                                                                    <b style=" @if(count(DB::table('questions')->where('year_id', $year->id)->where('course_id', $course->id)->get())) color: red; @endif font-size: larger">
                                                                        {{count(DB::table('questions')->where('year_id', $year->id)->where('course_id', $course->id)->get())}}</b>
                                                                    questions uploaded on this session.
                                                                </div>
                                                            </div>
                                                        </div>
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