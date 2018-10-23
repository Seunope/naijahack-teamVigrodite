@extends('layouts.admin-master')

@section('title', 'Admin course edit')

@section('content')


    <div id="page-wrapper">
        <h3>Modify Course</h3>
        <div class="panel panel-primary"></div>

        @include('partial.admin.error')
        {!! Form::model($course,['method'=>'PATCH','action'=>['CourseAdminCoursesController@update',$course->slug]]) !!}
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="form-group">
            {!! Form::label('code', 'Course code') !!}
            {!! Form::text('code',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Course title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <!-- <div class="form-group">
            !! Form::label('department_id', 'Select Department') !!}
            !! Form::select('department_id', $departments ,null,['class'=>'form-control']) !!}
        </div> -->
<!-- 
        <div class="form-group">
            !! Form::label('semester_id', 'Select Semester') !!}
            !! Form::select('semester_id', $semesters ,null,['class'=>'form-control']) !!}
        </div> -->

        <!-- <div class="form-group">
            !! Form::label('level_id', 'Select level') !!}
            !! Form::select('level_id', $levels ,null,['class'=>'form-control']) !!}
        </div> -->

        <div class="form-group">
            {!! Form::label('unit', 'Course unit') !!}
            {!! Form::text('unit',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save changes',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}


    <div class="row">
        <a href="{{URL::to('/courseAdmin/courses')}}" class="btn btn-primary btn-sm pull-right"> Home </a>
    </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection