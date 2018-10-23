@extends('layouts.admin-master')

@section('title', 'Attach a image')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if(Session::has('status'))
                    <div style="text-align: center"
                         class="alert alert-success alert-dismissable" >
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
                @endif
                <h3>Add new image to the question</h3>
                <div class="panel panel-primary"></div>
                {!! Form::open(['method'=>'POST','action'=>'AdminQimagesController@store', 'files'=>true]) !!}
                {{  csrf_field()  }}

                <div class="form-group">
                    {!! Form::label('label', 'Image Label') !!}
                    {!! Form::text('label',null,['class'=>'form-control']) !!}
                </div>

                {!! Form::hidden('question_id', $question->id) !!}
                {!! Form::hidden('user_id', Auth::user()->id) !!}

                <div class="form-group">
                    {!! Form::label('file', 'Choose Image') !!}
                    {!! Form::file('file' ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('label', 'Choose size') !!}
                    {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
                </div>
                <button type="submit"><i class="fa fa-upload"></i>Upload</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>


@endsection