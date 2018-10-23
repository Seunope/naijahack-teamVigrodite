@extends('layouts.user-master')
@if(isset($string))
    @section('title', 'Search result for "'. $string.'""' )
@else
    @section('title', 'Search result' )
@endif
@section('content')


    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <br><span class="fa fa-search"></span><br>
                        <h4>Search result  @if(isset($string)) for <span style="color: midnightblue; font-size: 18px;">"{{$string or ''}}"</span> @endif</h4>
                        <h4 style="color: red">{{$noq or ''}} @if(isset($noq) && $noq>1) matches @else match @endif found</h4><br>
                        <hr>
                        @foreach($questions as $question)
                            <div class="row">
                                <div class="col-md-1 col-sm-1 col-xs-2 no-padding-right"></div>
                                <div class="col-md-11 col-sm-11 col-xs-10 no-margin-padding">
                                    <p style="margin-bottom: 2px;">{{$question->course->code  or '' }}-{{$question->year->name or '' }}- ({{$question->number or '' }}) -{{$question->course->school->name}}</p>
                                </div>
                            </div>
                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-md-1 col-sm-1 col-xs-2 no-padding-right">
                                    <span class="question-num">{{$question->number or ''}}. </span>
                                </div>
                                <div class="col-md-11 col-sm-11 col-xs-10 no-margin-padding">
                                    <div class="question">
                                        <p style="margin-bottom: 0px;font-size: 15px;">
                                            <a href="/general/questions/{{$question->slug or ''}}" style="color: #333; ">{!! $question->body or ''!!}</a>
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
                                        <div style="padding-left: 15px;">
                                            <small>Topic: {{$question->topic or 'null'}}</small>
                                            @if(isset($question->solution))
                                                <small class="alert-success"> Solved.</small>
                                                <small>@if(count($question->views)>1){{count($question->views)}} Views. @endif</small>
                                            @else
                                                <small class="alert-danger"> Not Solved.</small>
                                                <small>@if(count($question->views)>1){{count($question->views)}} Views. @endif</small>
                                            @endif
                                            {{--<a href="/general/questions/{{$question->slug or ''}}">Comments</a>--}}
                                            @if(count($question->comments)>1)
                                                <small>{{count($question->comments)}}  Discussions </small>
                                            @endif
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    <!--end-->
                        {!! $questions->render() !!}
                    </div>
                    <!--Question pane ends-->
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>


@endsection