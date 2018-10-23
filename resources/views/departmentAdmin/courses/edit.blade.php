@extends('layouts.admin-master')

@section('title', 'Admin course edit')

@section('content')


    <div id="page-wrapper">
        <h3>Modify Course</h3>
        <div class="panel panel-primary"></div>

        {!! Form::model($course,['method'=>'PATCH','action'=>['DepartmentAdminCoursesController@update',$course->slug]]) !!}
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
            {!! Form::label('user_id', 'Select  Co-ordintor for this department') !!}
            {!! Form::select('user_id', $users ,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('unit', 'Course unit') !!}
            {!! Form::text('unit',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save Changes '.$course->code,['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['DepartmentAdminCoursesController@destroy', $course->slug]]) !!}
        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete course.</button>
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

    <div class="row">
        <a href="{{URL::to('/departmentAdmin/courses')}}" class="btn btn-primary btn-sm pull-right"> Home </a>
    </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection