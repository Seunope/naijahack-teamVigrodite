@extends('layouts.user-master')

@section('title', ' Upload Image')

@section('content')

    <!-- content inside wrapper begins -->
    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <p>Question</p>
                        <p>{!! $question->body or '' !!}</p>
                        {{--<pre>{{$question->body or ''}}</pre>--}}
                        Add new image to your comment
                        <br>
                        {!! Form::open(['method'=>'POST','action'=>'UsersCimagesController@store', 'files'=>true]) !!}
                        {{  csrf_field() }}

                        <div class="form-group">
                            {!! Form::label('label', 'Image Label') !!}
                            {!! Form::text('label',null,['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('file', 'Choose Image') !!}
                            {!! Form::file('file' ,null,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::hidden('comment_id', $comment->id ,null) !!}
                        {!! Form::hidden('user_id', Auth::user()->id ,null) !!}
                        {!! Form::hidden('question_slug', $comment->question->slug) !!}

                        <div class="form-group">
                            {!! Form::label('size', 'Choose size') !!}
                            {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                        </div>

                        <button type="submit"><i class="fa fa-upload"></i>Upload</button>

                    {!! Form::close() !!}


                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection