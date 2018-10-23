@extends('layouts.user-master-no-nav')

@section('title', ' Select cbt course')

@section('content')

    <div class="section">
        <div class="search-input">
            <div class="container">
                <br>
                @if(Session::has('warning'))
                    <div class="alert alert-warning">{{Session('warning')}}<span class="fa fa-check"></span></div>
                @endif
                <div class=" @if(Session::has('warning')) " @endif search-input-wrapper">
                {!! Form::open(['method'=>'POST','action'=>'SearchController@advancedSearch']) !!}
                <div class="form-group">
                    {!! Form::label('course_id', 'Course') !!}
                    {!! Form::select('course_id', $courses ,null,['class'=>'form-select']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('year_id', 'Year/Session') !!}
                    {!! Form::select('year_id', $years ,null,['class'=>'form-select']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('number', 'Question number') !!}
                    {!! Form::text('number' ,null,['placeholder'=>'Type number..','class'=>'form-select']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="advanced-search-btn form-submit btn btn-blue"><span>search now<i class="fa fa-search"></i></span></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection