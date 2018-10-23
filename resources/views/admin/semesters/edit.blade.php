@extends('layouts.admin-master')

@section('title', 'Admin school edit')

@section('content')


    <div id="page-wrapper">
        {{--<div class="row">--}}
        <h3>Title</h3>
        <div class="panel panel-primary"></div>
        {{--Page title--}}
        @include('partial.admin.error')
        {!! Form::model($school,['method'=>'PATCH','action'=>['AdminSchoolsController@update', $school->slug ]]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name', 'Edit School Name') !!}
            {!! Form::text('name',$school->name,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('full_name', 'Edit schools Full name') !!}
            {!! Form::text('full_name',$school->full_name,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Admin password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save changes to school- '.$school->name,['class'=>'btn btn-primary pull-left']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE','action'=>['AdminSchoolsController@destroy', $school->slug]]) !!}
        <div class="">
            {!! Form::submit('Delete '.$school->name,['class'=>'btn btn-danger ']) !!}
        </div>
        {!! Form::close() !!}


        <div class="row">
            <a href="{{URL::to('/admin/schools')}}" class="btn btn-success btn-sm pull-right btn-margin">Home</a>
        </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection