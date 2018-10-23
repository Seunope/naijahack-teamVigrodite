@extends('layouts.user-master')
@if(isset($course))
    @section('title', $course->code.' '. $course->title .' and sessions')
@else
    @section('title', ' Courses and sessions')
@endif

@section('description', $course->department->faculty->school.' '.$course->code.'- '.$course->title.' past questions are here')
@section('keywords', $course->code, $course->title,$course->code.$course->title)


@section('content')
    <div class="section section-padding news-detail" style="padding: 0px">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <div class="section choose-course-3" style="margin: 60px 0px 30px 0px;">
                            <div class="group-title-index"><h4 class="top-title">CHOOSE SESSION</h4>

                                <h2 class="center-title"> {{$course->code or ''}} </h2>

                                {{--<div class="bottom-title"><i class="bottom-icon icon-icon-04"></i></div>--}}
                            </div>
                            <div class="choose-course-3-wrapper row">
                                @if(!empty($years))
                                    @foreach($years as $year)
                                        <div class="item-course" style="height: 100%">
                                            <div class="item-course-wrapper" style="padding-top: 8%;padding-bottom: 8%;">
                                                <div class="icon-course course-year" style="display: block;">
                                                    <a href="/general/questions/{{$course->slug or ''}}/{{$year->year->slug or ''}}/Exam" style="font-size: 41px" class="icons-img hidden-xs hidden-sm">{{$year->year->name or ''}}</a>
                                                    <a href="/general/questions/{{$course->slug or ''}}/{{$year->year->slug or ''}}/Exam" style="font-size: 30px" class="icons-img hidden-md hidden-lg">{{$year->year->name or ''}}</a>
                                                </div>
                                                <div class="info-course" style="display: block;padding-left: 0px;">
                                                    {{--<a href="/general/questions/{{$course->slug or ''}}/{{$year->year->slug or ''}}/Exam" class="name-course">{{$year->year->id or ''}}</a>--}}
                                                <div class="info">
                                                    <b style=" @if(count(DB::table('questions')->where('year_id', $year->year->id)->where('course_id', $course->id)->get())) color: red; @endif font-size: larger">
                                                        {{count(DB::table('questions')->where('year_id', $year->year->id)->where('course_id', $course->id)->get())}}
                                                    </b> 
                                                    past questions.
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>


@endsection