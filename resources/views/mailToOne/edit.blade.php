@extends('layouts.admin-master')

@section('title', 'Admin faculty edit')

@section('content')


    <div id="page-wrapper">
        <h3>Title</h3>
        <div class="panel panel-primary"></div>
        @include('partial.admin.error')
        {!! Form::model($faculty,['method'=>'PATCH','action'=>['AdminFacultiesController@update',$faculty->slug]]) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::label('name', 'Edit Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('full_name', 'Edit Full name of faculty') !!}
            {!! Form::text('full_name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Edit faculty '.$faculty->name,['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminFacultiesController@destroy', $faculty->slug]]) !!}
        <div class="">
            {!! Form::submit('Delete '.$faculty->name,['class'=>'btn btn-danger ']) !!}
        </div>
        {!! Form::close() !!}

    <div class="row">
        <a href="{{URL::to('/admin/faculties')}}" class="btn btn-primary btn-sm pull-right"> Home </a>
    </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection