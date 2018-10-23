@extends('layouts.admin-master')

@section('title', 'Attach a image')

@section('content')
    <div id="page-wrapper">
        @if(Session::has('status'))
            <div style="text-align: center"
                 class="alert alert-success alert-dismissable" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{Session('status')}}<span class="fa fa-check"></span></div>
        @endif
            <h3>Add new image to the solution</h3>
            <div class="panel panel-primary"></div>
        <div class="row">
            {!! Form::open(['method'=>'POST','action'=>'AdminSimagesController@store', 'files'=>true]) !!}
            {{  csrf_field()  }}

            <div class="form-group col-md-7">
                {!! Form::label('label', 'Image Label') !!}
                {!! Form::text('label',null,['class'=>'form-control']) !!}
            </div>

            {!! Form::hidden('solution_id', $solution->id) !!}
            {!! Form::hidden('question_slug', $solution->question->slug) !!}
            {!! Form::hidden('user_id', Auth::user()->id) !!}
            <div class="form-group col-md-3">
                {!! Form::label('file', 'Choose Image') !!}
                {!! Form::file('file' ,null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group col-md-2">
                {!! Form::label('label', 'Choose size') !!}
                {!! Form::select('size', ['1'=>'Small','2'=>'Medium','3'=>'Big'] ,null,['class'=>'form-control']) !!}
            </div>
        </div>
        <button type="submit">Upload</button>
        {!! Form::close() !!}
    </div>


@endsection