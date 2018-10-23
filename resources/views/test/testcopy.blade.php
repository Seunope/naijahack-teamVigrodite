<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ut3f-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sol.ng | test page</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bundle.core.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bundle.thread.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('admin/font-awesome/css/font-awesome.min.css')}}" />
    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="{{URL('assets/css/color-1.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL('assets/css/style.css')}}">
    <style>
        .category-widget {
            margin-top: 10px;
            position: fixed;
            top: 10px;
            left: 80%;
            width: 15%;
        }
    </style>
</head>
<body onload="count()">
<header>
    {{--@include('partial.user.header')--}}
    {{--@include('partial.user.nav')--}}
</header>
<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="section section-padding news-detail small-padding">
                    <div class="container">
                        <div class="news-detail-wrapper">
                            <div class="row">
                                <div class="col-md-9 col-sm-12" id="testPane">
                                    <meta name="_token" content=" "  property=""/>
                                    @if(count($questions)>1)
                                        <div class="center">
                                            <a href="" class="small-title">{{$course->code or ''}} {{$year->name or 'RANDOM'}} CBT TEST</a>
                                            <hr><br>
                                        </div>
                                        <div class="course_details">
                                            <b>COURSE CODE:  </b>  {{$course->code or ''}} <br>
                                            <b>COURSE TITLE: </b>  {{$course->title or ''}} <br>
                                            <b>SESSION: </b>  {{$year->name or 'Random'}}<br>
                                            <form name="f1" id="f1">
                                                <span id="time" style="color: #ff3300; font-size: 25px;">0</span>
                                            </form>
                                        </div>
                                        <hr>
                                        {!! Form::open(['url'=>'submitTest','id'=>'endTest','class'=>''])!!}
                                        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                        <input type="hidden" name="testId" id="csrf-token" value="{{ $testId}}" />
                                        <input type="hidden" name="questionNumber" value="{{$numberOfQuestion}}" />
                                        <input type="hidden" name="courseId" value="{{$course->id or ''}}" />
                                        <input type="hidden" name="yearId" value="{{$year->id or ''}}" />
                                        @foreach($questions as $question)
                                        <!--start-->
                                            @if(($question != null))
                                                <div class="row">
                                                    <div class="col-md-1 col-sm-1 col-xs-2 no-padding-right">
                                                        <span class="question-num">{{$num++}}.</span>
                                                    </div>
                                                    <div class="col-md-11 col-sm-11 col-xs-10 no-margin-padding">
                                                        <div class="question">
                                                            <p>{!! $question->body or ''!!}</p>
                                                            {{--<pre>{!! $question->body or ''!!}</pre>--}}
                                                        </div>
                                                        <div class="row">
                                                            @foreach($question->qimages as $qimage)
                                                                <div class="col-md-3 col-sm-5 col-xs-5">
                                                                    <img src="{{$qimage->path or ''}}" class="question-image">{{$qimage->label or ''}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>
                                                @include('test.optionA')
                                                @include('test.optionB')
                                                @include('test.optionC')
                                                @include('test.optionD')
                                            @endif
                                        @endforeach
                                        <div style="text-align: center;">
                                            <button class="form-submit btn btn-blue" id="submitTest" title="End test" value="{{ $testId }}">Submit test</button>
                                        </div>
                                        {!! Form::close() !!}
                                    @else
                                        <div class="alert alert-warning">
                                            <span class="fa fa-warning"></span> No question yet for this course in this session
                                        </div>
                                    @endif
                                </div>
                                @include('partial.user.cbt-sidebar')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BUTTON BACK TO TOP-->
    <div id="back-top"><a href="#top"><i class="fa fa-angle-double-up"></i></a></div>
</div>

<!-- FOOTER-->
<div style="text-align: center; font-size: 17px">
    &copy;sol.ng cbt for everyone for better performance.
    <br>
</div>
<script type="text/javascript">
    var x={{$time}},y=0;
//    var x=1,y=0;
    function count()
    {
        y = y - 1 ;
        if (y == -1){
            y =59  ;x = x - 1 ;if (x == -1)
                return ;
        }
        document.getElementById("time").innerHTML = x +":"+ y ;
        document.getElementById("time2").innerHTML = x + ":" + y ;
        setTimeout("count()" , 1000 ) ;
        if(document.getElementById("time").innerHTML=='0:0')
        {
            document.getElementById('submitTest').click();
//            alert('Your time has ended');
        }
    }
    $(function(){
        $('#endTest').on('submit',function(e){
            $.ajaxSetup({
                header:$('meta[name="_token"]').attr('content')
            });
            e.preventDefault(e);

            $.ajax({
                type:"POST",
                url:'/submitTest',
                data:$(this).serialize(),
                dataType: 'json',
                success: function(data){
                    console.log(data);
                },
                error: function(data){
                }
            })
        });
    });

</script>
<script type="text/javascript" src="{{URL::asset('assets/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('admin/js/app/app.js')}}"></script>

</body>
</html>
