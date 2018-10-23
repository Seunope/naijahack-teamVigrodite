@extends('layouts.user-master')

@section('title', $course->code ." -".$course->title ." -".$course->department->faculty->school->name)
@section('description', 'Get questions under '. $course->code ." -". $course->title ." -".$course->department->faculty->school->name)
@section('keywords', $course->code ." past questions,".$course->code .",".$course->title .','. $course->department->faculty->school->name)

<style>
    .btn{
        padding: 1px 6px !important;
    }
</style>
@section('content')
    {{--search index--}}
    <div class="row">
        <div class="col-md-9">

            {{--DISPLAY SCHOOLS--}}
            <div class="section">
                <p class="school-names-style pullCenter"><b>{{$course->code or ''}} -{{$course->title or ''}} {{count(DB::table('questions')->where('course_id', $course->id)->get())}} + QUESTIONS.</b></p>
                <hr>
                <br><br>
                <div class="row pullCenter" style="margin-bottom: 30px">
                    @foreach($years as $year)
                        <a href="/general/questions/{{$course->slug or ''}}/{{$year->year->slug or ''}}/Exam" class="btb btn-info btn-lg" >
                            {{$year->year->name or ''}} -
                            {{count(DB::table('questions')->where('year_id', $year->year->id)->where('year_id', $year->year->id)->where('course_id', $course->id)->get())}} questions available
                        </a>
                        <br><br><br>
                    @endforeach
                </div>
            </div>
            {{--DISPLAY SCHOOLS ENDS --}}
        </div>
        @include('partial.user.sidebar')
    </div>
    {{--<!-- LOADING-->--}}
    {{--<div class="body-2 loading">--}}
    {{--<div class="dots-loader"></div>--}}
    {{--</div>--}}
    <!-- JAVASCRIPT LIBS-->
    <script src="{{url('assets/libs/owl-carousel-2.0/owl.carousel.min.js')}}"></script>
    <!-- MAIN JS-->
    <script src="{{url('assets/js/main.js')}}"></script>
    <!-- LOADING SCRIPTS FOR PAGE-->

@endsection




