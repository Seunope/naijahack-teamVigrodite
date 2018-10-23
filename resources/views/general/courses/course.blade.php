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

                            <div class="underline">
                                {{$course->code or ''}} <br> Which year? choose the session.
                            </div>
                            <div class="choose-course-3-wrapper row">
{{--                                @if(!empty($years))--}}
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
                                {{--@endif--}}
                            </div>
                        </div>
                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>


@endsection