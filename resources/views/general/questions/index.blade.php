@extends('layouts.user-master-editor')

@section('title', 'List of '.$course->code.' '.$year->name.' Questions')

@section('private-head')
    <script>
        function topicToggle(){
            $("#topicDiv").toggle();
            $("#topicExisting").toggle();
            $("#topicLabel").text('Click here if the topic is existing');
        }
        tinymce.init({
            selector:'#question_body',
            menubar : false,
            toolbar: 'undo redo hr tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry styleselect',
            plugins: "tiny_mce_wiris ",
        });
        tinymce.init({
            selector:'#solution_body',
            menubar : false,
            toolbar: 'undo redo hr tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry table fontselect styleselect',
            plugins: "tiny_mce_wiris",
            height: "150",
            width: "600"
        });

        function create() {
            var question_text = $("iframe#question_body_ifr").contents().find("body").html();
            $("#question_text").html(question_text);
            $("#question_form").submit();
        }
    </script>
@endsection

@section('content')

    <link rel="stylesheet" type="text/css" href="{{url('admin/css/app/app.css')}}" />
    <style type="text/css">
        body{
            background-color: #ffffff;
        }
        small{
            font-size: 9px;
        }
        .btn{
            padding: 1px 6px;
        }
        .note-toolbar, btn-toolbar
        {
            background-color: #86bc42 !important;
        }
    </style>
    <script type="text/javascript" src="{{url('admin/js/vendor/all.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/app/app.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/ajaxLoader.js')}}"></script>

    {{--    @include('user.advance-search')--}}



    {{--<link rel="stylesheet" type="text/css" href="{{URL('admin/bootstrap/css/bootstrap.min.css')}}" />--}}
    <link rel="stylesheet" type="text/css" href="{{URL('admin/font-awesome/css/font-awesome.min.css')}}" />
    {{--<link rel="stylesheet" type="text/css" href="{{URL('admin/css/app/app.css')}}" />--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{URL('admin/css/vendor/all.css')}}" />--}}
    {{--<link rel="stylesheet" type="text/css" href="{{URL('admin/css/local.css')}}" />--}}
    {{--<link rel="stylesheet" type="text/css" href="{{URL('admin/css/my.css')}}" />--}}



    {{--<script type="text/javascript" src="{{URL('admin/js/jquery-1.10.2.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{URL('admin/bootstrap/js/bootstrap.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{URL('admin/js/vendor/all.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{URL('admin/js/app/app.js')}}"></script>--}}


    <div class="section section-padding news-detail small-padding top-20">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <!--Question pane begins-->
                    <div class="col-md-9 col-sm-12">
                        @if(Session::has('status'))
                            <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('status')}}<span class="fa fa-check"></span></div>
                        @endif
                        <div>
                            <div class="news-tag">
                                <ul class="tag-list list-unstyled">
                                    <div>
                                        <li style="margin: -2px; padding: 0 !important;"></li>
                                        <li class="@if(isset($isExam) && $isExam=="Exam") active @endif "><a href="/general/questions/{{$course->slug or ''}}/{{$year->slug or ''}}/Exam" class="tag-item"> Exam </a></li>
                                        <li class="@if(isset($isExam) && $isExam=="Test") active @endif "><a href="/general/questions/{{$course->slug or ''}}/{{$year->slug or ''}}/Test" class="tag-item"> Test </a></li>
                                        <li class="@if(isset($isExam) && $isExam!="Test" && $isExam!="Exam") active @endif "><a href="/general/questions/{{$course->slug or ''}}/{{$year->slug or ''}}/Assignment" class="tag-item"> Assignment</a></li>
                                    </div>
                                </ul>
                            </div>


                        </div>
                        @if(!empty($questions))
                            {{--<small>{{Auth::user()->credit->value}}<img src="/assets/images/coins2.png" style="width: 2%;"></small>--}}
                            <div>
                                <a href="" class="small-title">{{$course->code or ''}} {{$year->name or ''}} @if(isset($isExam) && $isExam=="Exam") EXAMINATION @elseif(isset($isExam) && $isExam=="test") TEST @else ASSIGNMENT @endif PAST QUESTION</a>
                                <br>
                            </div>
                            <div class="course_details">
                                <p><b>COURSE CODE:  </b>  {{$course->code or ''}} </p>
                                <p><b>COURSE TITLE: </b>  {{$course->title or ''}} </p>
                                <p><b>SESSION: </b>  {{$year->name or ''}}</p>
                                <p><b>SEMESTER: </b>  {{$course->semester->name or ''}}</p>
                            </div>
                            {{--<hr style="border-top: 3px solid #eee;margin-bottom: 25px;">--}}
                            @foreach($questions as $question)
                                <a href="/general/questions/{{$question->slug or ''}}" style="color: #333; padding-bottom: 20px; ">
                                    <div class="row" style="padding-top: 10px; box-shadow: 0 1px 1px #ddd; margin-left: -3px; margin-bottom: 30px;">
                                        <div class="col-md-1 col-sm-1 col-xs-2 no-padding-right" style="padding-left: 2px;" >
                                            <span class="question-num">{{$question->number or ''}}. </span>
                                        </div>
                                        <div class="col-md-11 col-sm-11 col-xs-10 no-margin-padding">
                                            <div class="question">
                                                <p style="margin-bottom: 0;font-size: 15px;">
                                                    {!! $question->body or ''!!}
                                                </p>
                                            </div>
                                            <div class="row">
                                                @foreach($question->qimages as $qimage)
                                                    <div class="col-md-3 col-sm-5 col-xs-5">
                                                        <img src="{{$qimage->path or ''}}" class="question-image">{{$qimage->label or ''}}
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div style="padding-left: 10px; padding-top:10px">
                                                    {{--<div>--}}
                                                   
                                                    <small>{{$question->user ? 'question by: '.$question->user->name : ''}}</small>
                                                    @if(isset($question->solution))
                                                        <small class="alert-success">solved</small>
                                                        <small>{{$question->solution->user ? 'By: '.$question->solution->user->name : ''}}</small>
                                                    @else
                                                        <small class="alert-danger">not solved</small>
                                                    @endif
                                                    <a href="/admin/questions/{{$question->slug or 'null'}}"> <small> edit(for admin)</small></a>
                                                    @if(count($question->comments)>1)
                                                        <small>{{count($question->comments)}}  discussions </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                <span class="fa fa-warning"></span> No question yet for this course in this session
                            </div>
                        @endif
                        <hr>
                        <h4 class="text-danger">Add a {{$course->code or ''}} {{$year->name or ''}} past question. Uploaded by "{{Auth::user()->name}}".</h4>
                        {!! Form::open(['method'=>'POST','id'=>'question_form','action'=>'UsersQuestionsController@store']) !!}
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::label('number', 'Number') !!}
                                {!! Form::text('number',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                {!! Form::label('body', 'Question') !!}
                                <textarea name="" id="question_body" required></textarea>
                                <textarea name="body" id="question_text" hidden required></textarea>
                            </div>
                        </div>

                        {!! Form::hidden('course_id', $course->id) !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        {!! Form::hidden('year_id', $year->id) !!}
                        @if(isset($isExam) && $isExam=="Exam")
                            {!! Form::hidden('isExam', 1 ) !!}
                        @elseif(isset($isExam) && $isExam=="Test")
                            {!! Form::hidden('isExam', 2 ) !!}
                        @else
                            {!! Form::hidden('isExam', 3 ) !!}
                        @endif
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <div id="topicExisting">
                                    {!! Form::label('topic_id', 'Select from existing topic') !!}
                                    {!! Form::select('topic_id', $topics ,null,['class'=>'form-control']) !!}
                                </div>
                                <input name="topicCheckBox" type="checkbox" id="topicCheckBox" onclick="topicToggle();">
                                <label for="topicCheckBox" id="topicLabel">Click here if the topic is not existing.</label>
                                <div id="topicDiv" hidden>
                                    {!! Form::label('topic', 'New Topic') !!}
                                    {!! Form::text('topic', null,['class'=>'form-control', 'id'=>'topicNew']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <div class="col-md-4">
                                <br>
                                <input type="button" class="pull-right"  name="upload" value="Upload" onclick="create();" style="color: #000; height: 34px;">
                            </div>
                            <div class="col-md-4"></div>
                        </div>



                        <small>Let people benefit from you.</small>
                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>


@endsection