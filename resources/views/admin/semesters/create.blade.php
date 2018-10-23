@extends('layouts.admin-master')

@section('title', 'Admin add new school')

@section('content')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3>Add new Semester</h3>
                <div class="panel panel-primary"></div>
                {!! Form::open(['method'=>'POST','action'=>'AdminSemestersController@store']) !!}
                {{ csrf_field() }}

                <div class="form-group">
                    {!! Form::label('name', 'Semester short') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('full_name', 'Semester full name') !!}
                    {!! Form::text('full_name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('slug',null,['class'=>'form-control']) !!}
                </div>

                {{--<div class="form-group">--}}
                    {{--{!! Form::label('full_name', 'Full name of school') !!}--}}
                    {{--{!! Form::text('full_name',null,['class'=>'form-control']) !!}--}}
                {{--</div>--}}

                <div class="form-group">
                    {!! Form::label('password', 'Admin password') !!}
                    {!! Form::password('password',['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::reset('Cancel',['class'=>'btn btn-danger pull-left btn-padding']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Add new school',['class'=>'btn btn-primary pull-left']) !!}
                </div>
                {!! Form::close() !!}
                <div class="row">
                    <a href="{{URL::to('/admin/levels')}}" class="btn btn-success btn-sm pull-right">levels Home</a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- /.row -->
    </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection