@extends('layouts.user-master')

@section('title', ' Add Solution Image')

@section('content')

    <!-- content inside wrapper begins -->
    <div class="section section-padding news-detail small-padding">
        <div class="container">
            <div class="news-detail-wrapper">
                <div class="row">
                    <div class="col-md-9 col-sm-12">
                        <p>Solution</p>:
                        <p>{!! $solution->body or '' !!}</p>
                        {{--<pre>{{$solution->body or ''}}</pre>--}}
                        <div class="">Add new image to this solution</div>
                        {!! Form::open(['method'=>'POST','action'=>'UsersSimagesController@store', 'files'=>true]) !!}
                        {{  csrf_field()  }}

                        <div class="form-group">
                            {!! Form::label('label', 'Image Label', ['class'=>'control-label form-label']) !!}
                            {!! Form::text('label',null,['class'=>'form-input form-control']) !!}
                        </div>

                        {!! Form::hidden('solution_id', $solution->id) !!}
                        {!! Form::hidden('question_slug', $solution->question->slug) !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}

                        <div class="form-group">
                            {!! Form::label('file', 'Choose Image') !!}
                            {!! Form::file('file' ,null,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('label', 'Choose size') !!}
                            {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                        </div>
                        <button class="btn btn-bold btn-blue"type="submit"><i class="fa fa-upload"></i>Upload</button>
                        {!! Form::close() !!}

                    </div>
                    @include('partial.user.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection