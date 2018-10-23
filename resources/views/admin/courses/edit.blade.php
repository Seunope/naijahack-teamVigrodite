@extends('layouts.admin-master')

@section('title', 'Admin course edit-'.$course->code)

@section('content')


    <div id="page-wrapper">
        <h3>Modify Course</h3>
        <div class="panel panel-primary"></div>

        @include('partial.admin.error')
        {!! Form::model($course,['method'=>'PATCH','action'=>['AdminCoursesController@update',$course->slug]]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('code', 'Course code') !!}
            {!! Form::text('code',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Course title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('user_id', 'Select coordinator for this course') !!}
            <select name="user_id" class="form-control form-input">
                <option value="0">None</option>
                @foreach($users as $user)
                    <option value="{{$user->id or '' }}">{{$user->name or '' }} -{{$user->department->name or '' }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            {!! Form::label('unit', 'Course unit') !!}
            {!! Form::text('unit',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save changes',['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminCoursesController@destroy', $course->slug]]) !!}
        <button type="button" class="btn btn-sm btn-link btn-start" data-toggle="modal" data-target="#deleteModal">Delete</button>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog smlr" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this course?</h4>
                    </div>
                    <div class="modal-footer">
                        {!! Form::button('No ',['class'=>'btn btn-success pull-left', 'data-dismiss'=>'modal']) !!}
                        {!! Form::submit('Delete' ,['class'=>'btn btn-danger']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection