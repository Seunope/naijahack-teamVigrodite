@extends('layouts.admin-master')

@section('title', 'Admin add new Question')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Question</h3>
                <div class="panel panel-primary"></div>
                {!! Form::open(['method'=>'POST','action'=>'AdminQuestionsController@store']) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('number', 'Number') !!}
                    {!! Form::text('number',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Question') !!}
                    <textarea name="body" id="description" cols="30" rows="10" class="summernote"></textarea>
                </div>

                <div class="form-group">
                    {!! Form::label('course_id', 'Select Course') !!}
                    {!! Form::select('course_id', $courses ,null,['class'=>'form-control']) !!}
                </div>
                {!! Form::hidden('user_id', Auth::user()->id ,null,['class'=>'form-control']) !!}
                <div class="form-group">
                    {!! Form::label('year_id', 'Select Session') !!}
                    {!! Form::select('year_id', $years ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('topic_id', 'Select topic') !!}
                    {!! Form::select('topic_id', $topics ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Choose type') !!}
                    {!! Form::select('type', ['0'=>'plain','1'=>'objective','2'=>'structural'] ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add new question',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <a href="{{URL::to('/admin/questions')}}" class="btn btn-primary btn-sm pull-right">Home</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- /.row -->


@endsection