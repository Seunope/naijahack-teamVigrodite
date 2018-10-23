@extends('layouts.admin-master')

@section('title', 'Admin school edit')

@section('content')


    <div id="page-wrapper">
        <h3>Modify School</h3>
        <div class="panel panel-primary"></div>

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
            {!! Form::label('user_id', 'Select  Co-Ordintor') !!}
            {!! Form::select('user_id', $users ,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Admin password') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save changes',['class'=>'btn btn-primary pull-left']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE','action'=>['AdminSchoolsController@destroy', $school->slug]]) !!}
        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-remove"></i> Delete school.</button>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog smlr" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title pull-center" id="myModalLabel">Are you sure you want to delete this school?</h4>
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
            <a href="{{URL::to('/admin/schools')}}" class="btn btn-success btn-sm pull-right btn-margin">Home</a>
        </div>
    {{--</div>--}}
    <!-- /.row -->
    </div>


@endsection