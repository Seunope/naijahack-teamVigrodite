@extends('layouts.admin-master')

@section('title', 'Admin add new department')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Department</h3>
                <div class="panel panel-primary"></div>

                {!! Form::open(['method'=>'POST','action'=>'AdminDepartmentsController@store']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('faculty_id', 'Select Faculty') !!}
                        {!! Form::select('faculty_id', $faculties ,null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('full_name', 'Full name of Department') !!}
                        {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Add new department',['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <a href="{{URL::to('/admin/departments')}}" class="btn btn-primary btn-sm pull-right">Home</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    <!-- /.row -->
    </div>


@endsection