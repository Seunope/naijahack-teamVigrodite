@extends('layouts.admin-master')

@section('title', 'Admin role edit')

@section('content')


    <div id="page-wrapper">
        <h3>Modify Role</h3>
        <div class="panel panel-primary"></div>

        {!! Form::model(1,['method'=>'PATCH','action'=>'AdminRolesController@update']),1 !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Add new school',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

        <a href="{{URL::to('/admin/roles')}}" class="btn btn-primary btn-sm pull-right"><<Home</a>

    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection