    @extends('layouts.admin-master')

    @section('title', 'Admin add new department')

    @section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Course</h3>
                <div class="panel panel-primary"></div>

                {!! Form::open(['method'=>'POST','action'=>'AdminCoursesController@store']) !!}
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
                    {!! Form::label('department_id', 'Select Department') !!}
                    {!! Form::select('department_id', $departments ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('semester_id', 'Select Semester') !!}
                    {!! Form::select('semester_id', $semesters ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('level_id', 'Select level') !!}
                    {!! Form::select('level_id', $levels ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('unit', 'Course unit') !!}
                    {!! Form::text('unit',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('type', 'Choose type') !!}
                    {!! Form::select('type', ['0'=>'ppt','1'=>'cbt'] ,null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add new course',['class'=>'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                <a href="{{URL::to('/admin/courses')}}" class="btn btn-primary btn-sm pull-right">Home</a>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- /.row -->
</div>


@endsection