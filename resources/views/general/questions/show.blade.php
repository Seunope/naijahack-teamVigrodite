@extends('layouts.user-master')
@if(isset($question))
    @section('title', $question->course->code.' '.$question->year->name.'-Question'.$question->number)
@else@section('title','Question')
@endif

@section('content')


    <link rel="stylesheet" type="text/css" href="{{URL('admin/css/app/app.css')}}" />
    <script type="text/javascript" src="{{URL('admin/js/vendor/all.js')}}"></script>
    <script type="text/javascript" src="{{URL('admin/js/app/app.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/bundle.core.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/bundle.thread.css')}}" />
    <style>
        .btn{
            padding: 1px 6px;
        }
        .note-toolbar, btn-toolbar
        {
            background-color: #86bc42 !important;
        }
    </style>
    <!-- content inside wrapper begins -->
    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <!--Question pane begins-->
                    <div class="col-md-9 col-sm-12">
                        @if(Session::has('status'))
                            <div style="text-align: center; font-size: 20px;" class="alert alert-success alert-dismissable" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{session('status')}}<span class="fa fa-check"></span>
                            </div>
                        @endif
                        <h2 class=""><u class="small-title">{{$question->course->code or ''}}- {{$question->year->name or ''}}-Question ({{$question->number or ''}})</u></h2>
                        {{--Display Question begins--}}
                        <div id="questioncontainer" class="contentWrapper positionLeft">
                            <div class="message positionLeft">
                                <div class="content-header">
                                    <span>Question</span>
                                </div>
                                @if(isset($question))
                                    @if(isset($question->user))
                                        <small>By<a class="" href="/profile/{{$question->user->name or ''}}/{{$question->user->slug or ''}}" title="{{$question->user->name or ''}}"> {{$question->user->name or ''}}</a>
                                            uploaded {{$question->created_at->diffForHumans()}}
                                        </small>
                                    @endif

                                    <span class="viewsCount">{{count($question->views)}} views</span>
                                    <div class="msgBody wrapWord fullMessage" style="color: #333;">

                                        @if(isset($edit))
                                            {!! Form::model($question,['method'=>'PATCH','action'=>['UsersQuestionsController@update',$question->slug]]) !!}
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                {!! Form::label('number', 'Number') !!}
                                                {!! Form::text('number',null,['class'=>'form-control']) !!}
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('body', 'Question') !!}
                                                {{--<textarea name="body" id="" cols="30" rows="10" class=""></textarea>--}}
                                                <textarea name="body" id="description" cols="30" rows="5" class="summernote"></textarea>
                                            </div>

                                            <div class="form-group">
                                                {!! Form::label('topic', 'Select topic') !!}
                                                {!! Form::text('topic' ,null,['class'=>'form-control']) !!}
                                            </div>
                                            {!! Form::hidden('question_slug' ,$question->slug) !!}
                                            <div class="form-group">
                                                {!! Form::submit('Save changes') !!}
                                            </div>
                                            {!! Form::close() !!}
                                        @else
                                            <p>{!! $question->body or '' !!}</p>
                                            @if($question->user_id==Auth::user()->id)
                                                <div style="display: flex">
                                                    @if($question->user->id == Auth::user()->id)
                                                        {!! Form::open(['method'=>'POST','action'=>['UsersQuestionsController@show', $question->slug],'style'=>'width:200px']) !!}
                                                        {{ csrf_field() }}
                                                        {!! Form::hidden('edit', 1 ,null) !!}
                                                        {!! Form::hidden('slug', $question->slug ,null) !!}
                                                        <button class="btn-link" style="margin-left: -6px; ">Edit</button>
                                                        {!! Form::close() !!}
                                                    @endif
                                                    <a href="/general/qimages/{{$question->slug or ''}}/create" class=" btn-link">Attach Image</a>
                                                </div>
                                            @endif
                                        @endif
                                        @endif
                                    </div>
                            </div>
                            {{--Display all question image begins--}}
                            @if(($question->qimages != null))
                                <div class="row">
                                    @foreach($question->qimages as $fig)
                                        <div class=" @if($fig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($fig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                                            <img src="{{$fig->path or ''}}" alt="{{$fig->label or ''}}" class="question-image"  title="{{$fig->label or ''}}" >
                                            <br>{{$fig->label}}
                                            @if(Auth::user()->id==$question->user_id)
                                                <a href="/general/qimages/{{$fig->slug or ''}}/edit" class=" btn-link btn-sm">Edit</a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                No image
                            @endif
                            @if($question->type==1)
                            <!-- Options begins -->
                                @include('user.options')
                            <!-- Options ends -->
                            @endif
                            {{--Display all question image ends--}}
                        </div>
                        {{--Display Question ends--}}


















                        {{--Solutionn begins--}}
                        <div class="contentWrapper positionLeft answerTagged">
                            <div class="message positionLeft">
                                <div class="messageType">
                                <span class="messageAnswer" title="This post answered the question">
                                    Solution
                                    <br>
                                </span>
                                    @if(isset($question->solution) && isset($question->solution->user))
                                        <small>By<a class="" href="/profile/{{$question->solution->user->name or ''}}/{{$question->solution->user->slug or ''}}" title="{{$question->solution->user->name or ''}}"> {{$question->solution->user->name or ''}}</a>
                                            uploaded {{$question->solution->created_at->diffForHumans()}}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            @if($question->solution != null)
                                <div class="message positionLeft">
                                    <div class="msgContent positionLeft">
                                        <div class="msgBody wrapWord fullMessage" style="color: #333;">
                                            <p>{!! $question->solution->body or '' !!}</p>
                                        </div>
                                        {{--Display all image for the answer begins--}}
                                        @if(($question->solution->simages != null))
                                            <div class="row">
                                                @foreach($question->solution->simages as $sfig)
                                                    <div class=" @if($sfig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($sfig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                                                        <img src="{{$sfig->path or ''}}" alt="{{$sfig->label or ''}}" class="question-image"  title="{{$sfig->label or ''}}" >
                                                        <br>{{$sfig->label}}
                                                        @if(Auth::user()->id==$question->solution->user_id)
                                                            <a href="/general/simages/{{$sfig->slug or ''}}/edit" class=" btn-link btn-sm">Edit</a>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            No image
                                        @endif
                                        {{--Display all image for the answer ends--}}
                                    </div>
                                </div>
                                @if(isset($editSol))
                                    {!! Form::model($question->solution,['method'=>'PATCH','action'=>['UsersSolutionsController@update',$question->solution->slug]]) !!}
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        {!! Form::label('body', 'Edit Answer') !!}
                                        {{--<textarea name="body" id="" cols="30" rows="10" class=""></textarea>--}}
                                        <textarea name="body" id="description" cols="30" rows="5" class="summernote"></textarea>
                                    </div>
                                    {!! Form::hidden('question_slug', $question->slug) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Save changes') !!}
                                    </div>
                                    {!! Form::close() !!}
                                @else
                                    @if($question->solution->user_id==Auth::user()->id)
                                        <div style="display: flex">
                                            @if($question->solution->user->id == Auth::user()->id)
                                                {!! Form::open(['method'=>'POST','action'=>['UsersQuestionsController@show', $question->slug],'style'=>'width:200px']) !!}
                                                {{ csrf_field() }}
                                                {!! Form::hidden('editSol', 1 ,null) !!}
                                                {!! Form::hidden('slug', $question->slug ,null) !!}
                                                <button class="btn-link" style="margin-left: -6px; ">Edit</button>
                                                {!! Form::close() !!}
                                            @endif
                                            <a href="/general/simages/{{$question->solution->slug or ''}}/create" class="btn-link ">Attach Image</a>
                                        </div>
                                    @endif
                                @endif
                                @if($question->solution->edited==1)
                                    <small>Edited</small>
                                @endif
                        </div>
                        @else
                            <div class="text-danger">
                                Upload answer
                            </div>
                            {!! Form::open(['method'=>'POST','action'=>'UsersSolutionsController@store']) !!}
                            {{  csrf_field() }}

                            <div class="form-group">
                                {!! Form::label('body', 'Answer') !!}
                                <textarea name="body" id="description" cols="30" rows="5" class="summernote"></textarea>
                            </div>

                            <div class="form-group">
                                {!! Form::hidden('question_id', $question->id) !!}
                                {!! Form::hidden('question_slug', $question->slug) !!}
                            </div>
                            <input type="submit" value="Upload">
                            {!! Form::close() !!}
                            {{--Show solution ends--}}
                        @endif



























                        {{--Comment beggins--}}

                        <div class="contentWrapper positionLeft answerTagged" style="border-bottom:none;">
                            <div class="message">
                                <div class="messageType">
                                <span class="messageAnswer" title="This post answered the question">
                                    Discussions
                                </span>
                                </div>
                            </div>
                            @if(($question->comments != null))
                                @foreach($question->comments as $comment)
                                    <div class="message commentMarginBottom">
                                        <div class="userInfo">
                                            <div>
                                                <div class="profile-image-display">
                                                    <a title="{{$comment->user->name or ''}}" class="message-user-image block-display circular-display avatar-size-small" href="">
                                                        <div class="default-avatar-profile circular-display red1807 avatar-size-small" title="{{$comment->user->name or ''}}">{{$comment->user->name[0]  or ''}}</div>
                                                    </a>
                                                </div>
                                                <a class="userNameShowWhiteSpace" href="/profile/{{$comment->user->name or ''}}/{{$comment->user->slug or ''}}" title="{{$comment->user->name or ''}}">
                                                    {{$comment->user->name or ''}}
                                                </a>
                                                <small>
                                                    {{$comment->created_at->diffForHumans()}}
                                                </small>
                                            </div>
                                        </div>
                                        <div class="msgContent positionLeft commentMargin">
                                            <div class="msgBody wrapWord fullMessage commentText" style="padding-right: 10px;">
                                                <p>{!! $comment->body or '' !!}</p>
                                                {{--<pre>{!! $comment->body or '' !!}</pre>--}}
                                            </div>
                                            {{--Display all image for the Comment begins--}}
                                            @if(($comment->cimages != null))
                                                <div class="row">
                                                    @foreach($comment->cimages as $cfig)
                                                        <div class=" @if($cfig->size ==1) col-md-4 col-sm-4 col-xs-4 @elseif($cfig->size ==2) col-sm-6 col-md-6 col-xs-6 @else col-md-12 col-sm-12 col-xs-12 @endif">
                                                            <img src="{{$cfig->path or ''}}" alt="{{$cfig->label or ''}}" class="question-image"  title="{{$cfig->label or ''}}" >
                                                            <br>{{$cfig->label}}
                                                            @if(Auth::user()->id==$cfig->user_id)
                                                                <a href="/general/cimages/{{$cfig->slug or ''}}/edit" class=" btn-link btn-sm">Edit</a>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                No image
                                            @endif
                                            {{--Display all image for the Comment ends--}}
                                            <hr style="margin-bottom: 0px">
                                            <ul class="messageControls positionLeft visible-lg visible-md visible-xs noMargin">
                                                <li class="qSubRatingPanel qRatingPanel tabsStop">
                                                    {{--<div class="positionLeft">--}}
                                                    {!! Form::open(['method'=>'POST','action'=>'HelpfulsController@store']) !!}
                                                    {!! Form::hidden('comment_id', $comment->id ,null,['class'=>'form-control']) !!}
                                                    {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
                                                    <button
                                                            @foreach($comment->helpfuls as $helpful)
                                                            @if(($helpful->user_id) == Auth::user()->id)
                                                            disabled=""
                                                            @endif
                                                            @endforeach
                                                            class="helpfulButton" title="
                                        @foreach($comment->helpfuls as $helpful)
                                                    @if(($helpful->user_id) == Auth::user()->id)
                                                            You have already mark this helpful
                                                            @else
                                                            Click to mark this helpful
                                                            @endif
                                                    @endforeach
                                                            ">
                                                        Helpful
                                                    </button>
                                                    {!! Form::close() !!}
                                                    {{--</div>--}}
                                                </li>
                                                @if(Auth::user()->id==$comment->user_id)
                                                    <li class="qSubRatingPanel qRatingPanel tabsStop">
                                                        {{--Button to add image begins--}}
                                                        <a href="/general/cimages/{{$comment->slug}}/create" class="btn-link btn-sm">Attach Image</a>
                                                    {{--Edit Comment begins--}}
                                                    <li class="qSubRatingPanel qRatingPanel tabsStop">
                                                        <button type="button" class=" btn-link btn-sm" data-toggle="modal" data-target="#EditComment"> Edit</button>
                                                        <div class="modal fade" id="EditComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="myModalLabel">Edit Comment</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{--Page title--}}
                                                                        {!! Form::model($comment,['method'=>'PATCH','action'=>['UserCommentsController@update',$comment->slug]]) !!}
                                                                        {{ csrf_field() }}

                                                                        <div class="form-group">
                                                                            {!! Form::label('body', ' Comment') !!}
                                                                            {{--<textarea name="body" id="" cols="30" rows="10" class=""></textarea>--}}
                                                                            <textarea name="body" id="description" cols="30" rows="5" class="summernote"></textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            {!! Form::submit('Edit Comment',['class'=>'btn btn-primary']) !!}
                                                                        </div>

                                                                        {!! Form::close() !!}

                                                                        {!! Form::open(['method'=>'DELETE','action'=>['UserCommentsController@destroy', $comment->slug]]) !!}
                                                                        <div class="">
                                                                            {!! Form::hidden('slug', $comment->question->slug ,null,['class'=>'form-control']) !!}
                                                                            {!! Form::submit('Delete Comment',['class'=>'btn btn-danger ']) !!}
                                                                        </div>
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endif
                                                <li class="qSubRatingPanel qRatingPanel tabsStop">
                                                    <div class="vote-count">
                                                        <span class="subRatingCount ratingCount"> @if(count($comment->helpfuls)>1) {{count($comment->helpfuls)}}  people found this helpful @elseif(count($comment->helpfuls)==1) 1 person found this helpful @endif</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    @if($comment->edited==1)
                                                        &nbsp;<small>&nbsp; Edited</small>
                                                    @endif
                                                </li>
                                            </ul>
                                            <hr style="margin-bottom: -10px; margin-top: -4px">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-danger">
                                    Be the first person  to comment!
                                </div>
                            @endif
                            {{--Button to Add answer begins--}}
                            <div style="" >
                                <p>Post your comment</p>
                                {!! Form::open(['method'=>'POST','action'=>'UserCommentsController@store']) !!}
                                {{  csrf_field() }}
                                {!! Form::hidden('question_id', $question->id ,null) !!}
                                {!! Form::hidden('slug', $question->slug ,null) !!}
                                {!! Form::hidden('user_id', Auth::user()->id ,null) !!}
                                <div class="">
                                    {!! Form::textarea('body',null,['class'=>'summernote','rows'=>'6']) !!}
                                    {{--<textarea name="body" id="description" cols="30" rows="5" required="required" class="summernote"></textarea>--}}
                                    {!! Form::submit('Post',['style'=>'color:white; background-color:#242c42; width:10%; border:none; height:30px; vertical-align:top']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                            {{--<small>If there is anything you can't type, type some first snap and upload the rest later. </small>--}}
                            {{--Button to Add Comment ends--}}
                            {{--<div>--}}
                                {{--<p>{{$question->course->code or ''}}- {{$question->year->name or ''}}    Question tags:</p>--}}
                                {{--@foreach($question->course->questions as $question)--}}
                                        {{--<a href="/general/questions/{{$question->slug or ''}}"> {{$question->number}} </a> ,--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                @include('partial.user.sidebar')
            </div>
        </div>
    </div>



@endsection