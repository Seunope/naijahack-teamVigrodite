@extends('layouts.admin-master')

@section('title', 'Admin add new image')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5><b>Comment: </b> {{$comment->body or ''}}</h5>
                <h3>Add new image to your comment</h3>
                <div class="panel panel-primary"></div>
                {!! Form::open(['method'=>'POST','action'=>'AdminCimagesController@store', 'files'=>true]) !!}
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    {!! Form::label('label', 'Image Label') !!}
                    {!! Form::text('label',null,['class'=>'form-control', 'required'=>'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'Choose Image') !!}
                    {!! Form::file('file' ,null,['class'=>'form-control']) !!}
                    @if ($errors->has('file'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                </span>
                    @endif
                </div>

                {!! Form::hidden('comment_id', $comment->id ,null) !!}
                {!! Form::hidden('user_id', Auth::user()->id ,null) !!}

                <div class="form-group">
                    {!! Form::label('size', 'Choose size') !!}
                    {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                </div>
                <button type="submit"><i class="fa fa-upload"></i>Upload</button>
            </div>

            {!! Form::close() !!}
            <a href="{{URL::to('/admin/roles')}}" class="btn btn-primary btn-sm pull-right">Home</a>
        </div>
    </div>
    <div class="col-md-2"></div>


@endsection