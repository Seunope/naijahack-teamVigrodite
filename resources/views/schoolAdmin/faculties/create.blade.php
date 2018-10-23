@extends('layouts.admin-master')

@section('title', 'Admin add new faculty')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Faculty</h3>
                <div class="panel panel-primary"></div>

                {!! Form::open(['method'=>'POST','action'=>'SchoolAdminFacultiesController@store']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>

                        {!! Form::hidden('school_id', $school_id ,null,['class'=>'form-control']) !!}

                    <div class="form-group">
                        {!! Form::label('full_name', 'Full name of faculty') !!}
                        {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Add new faculty',['class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                <a href="{{URL::to('/admin/faculties')}}" class="btn btn-primary btn-sm pull-right">Home</a>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    <!-- /.row -->
    </div>


@endsection