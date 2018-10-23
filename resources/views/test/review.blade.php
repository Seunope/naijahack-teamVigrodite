@extends('layouts.user-master')

@section('title', ' Review page')

@section('content')
    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12" id="testPane">
                        <meta name="_token" content=" "/>
                        <div class="center">
                            <a href="" class="small-title"> TEST REVIEW PAGE </a>
                            <br><span>{{$result->created_at->diffForHumans()}}</span>
                            <hr><br>
                        </div>
                        <div class="course_details">
                            <b>COURSE CODE:  </b>  {{$course->code or ''}} <br>
                            <b>SCORE : </b>  {{$result->score or ''}} Over {{$result->overAll or ''}} <br>
                        </div>
                        <hr>
                        @foreach($questions as $question)
                            @if(($question != null))
                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-xs-2 no-padding-right">
                                        <span class="question-num">{{$num++}})-</span>
                                    </div>
                                    <div class="col-md-11 col-sm-11 col-xs-10 no-margin-padding">
                                        <div class="question">
                                            <p>{!! $question->body or '' !!}</p>
                                            {{--<pre>{{$question->body or ''}}</pre>--}}
                                        </div>
                                        <div class="row">

                                        </div>
                                        <br>
                                    </div>
                                </div>
                                @include('test.optionA')
                                @include('test.optionB')
                                @include('test.optionC')
                                @include('test.optionD')
                                <h>Your option: @if($review->selectedOptions[$nim++]=='-') Nill @elseif($review->selectedOptions[$nim-1]==0) A @elseif($review->selectedOptions[$nim-1]==1) B @elseif($review->selectedOptions[$nim-1]==2)C @elseif($review->selectedOptions[$nim-1]==3) D @else Nothing @endif
{{--                                {{$review->correctOptions[$nom++]}}=={{$review->selectedOptions[$nom-1]}}--}}
                                @if(($review->correctOptions[$nom++])==($review->selectedOptions[$nom-1]))
                                    <i class="glyphicon glyphicon-ok" style="color: green; font-size: 25px;"></i>
                                @else
                                    <i class="glyphicon glyphicon-remove" style="color: red; font-size: 25px"></i>
                                @endif</h>
                                <h6>
                                    <div class="">Correct answer: @if($question->correctOption->correctOption==0) A @elseif($question->correctOption->correctOption==1) B @elseif($question->correctOption->correctOption==2) C @else D @endif</div>
                                </h6>
                            @endif
                        @endforeach
                        <div style="text-align: center;">
                            <button onclick="window.location.href='/select'" class="submitButton" id="submitTest" title="Take Another test" >Take Another test</button>
                        </div>
                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection