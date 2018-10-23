@extends('layouts.admin-master')

@section('title', 'Admin faculty edit')

@section('content')


<div id="page-wrapper">
    <h3>Modify Faculty</h3>
    <div class="panel panel-primary"></div>
    @include('partial.admin.error')
    {!! Form::model($faculty,['method'=>'PATCH','action'=>['SchoolAdminFacultiesController@update',$faculty->slug]]) !!}

    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


    <div class="form-group">
        {!! Form::label('name', 'Edit Name') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('full_name', 'Edit Full name of faculty') !!}
        {!! Form::text('full_name',null,['class'=>'form-control']) !!}
        {!! Form::hidden('school_id',$faculty->school->id ,null) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE','action'=>['SchoolAdminFacultiesController@destroy', $faculty->slug]]) !!}
    <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete </button>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog smlr" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this faculty?</h4>
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
        <a href="{{URL::to('/schoolAdmin/faculties')}}" class="btn btn-primary btn-sm pull-right"> Home </a>
    </div>
    {{--</div>--}}
    <!-- /.row -->
</div>


@endsection